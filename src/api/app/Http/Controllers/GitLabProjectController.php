<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GitLabProject;
use App\Http\Filters\DateFilter;
use App\Http\Filters\LimitFilter;
use App\Http\Filters\LicenseFilter;
use App\Http\Filters\LanguagesFilter;
use App\Http\Filters\ReadMeFilter;
use App\Http\Filters\ReadMeImagesFilter;
use App\Http\Filters\DescriptionFilter;
use App\Http\Filters\StarsFilter;
use App\Http\Filters\WatchersFilter;
use App\Http\Filters\ForksFilter;
use App\Http\Filters\OpenIssuesFilter;

class GitLabProjectController extends Controller
{

	//
	// getting methods
	//

	/**
	 * Get a particular project.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return App\Models\GitLabProject
	 */
	public static function getIndex(Request $request, string $id) {

		// find repository by id
		//
		$repository = GitLabProject::find($id);

		// check if found
		//
		if (!$repository) {
			return response("GitLab project not found.", 404);
		}

		return $repository;
	}

	/**
	 * Get all projects.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return App\Models\GitLabProject[]
	 */
	public static function getAll(Request $request) {

		// create query
		//
		$query = GitLabProject::query();

		// apply filters
		//
		$query = DateFilter::applyTo($request, $query);
		$query = LicenseFilter::applyTo($request, $query);
		$query = LanguagesFilter::applyTo($request, $query);
		$query = ReadMeFilter::applyTo($request, $query);
		$query = ReadMeImagesFilter::applyTo($request, $query);
		$query = DescriptionFilter::applyTo($request, $query);
		$query = StarsFilter::applyTo($request, $query);
		$query = WatchersFilter::applyTo($request, $query);
		$query = ForksFilter::applyTo($request, $query);
		$query = LimitFilter::applyTo($request, $query);

		// perform query
		//
		return $query->get();
	}

	/**
	 * Get the number of projects.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return integer
	 */
	public static function getNum(Request $request) {

		// create query
		//
		$query = GitLabProject::query();

		// apply filters
		//
		$query = DateFilter::applyTo($request, $query);
		$query = LicenseFilter::applyTo($request, $query);
		$query = LanguagesFilter::applyTo($request, $query);
		$query = ReadMeFilter::applyTo($request, $query);
		$query = ReadMeImagesFilter::applyTo($request, $query);
		$query = DescriptionFilter::applyTo($request, $query);
		$query = StarsFilter::applyTo($request, $query);
		$query = WatchersFilter::applyTo($request, $query);
		$query = ForksFilter::applyTo($request, $query);

		// perform query
		//
		return $query->count();
	}

	/**
	 * Get the number of projects by year.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return object
	 */
	public static function getNumByYear(Request $request) {
		$firstYear = intval(self::getFirstYear($request));
		$lastYear = intval(self::getLastYear($request));

		$nums = [];
		for ($year = $firstYear; $year <= $lastYear; $year++) {

			// create query
			//
			$query = GitLabProject::where('created_at', '>', strval($year) . '-01-01 00:00:00')
				->where('created_at', '<', strval($year + 1) . '-01-01 00:00:00');

			// apply filters
			//
			$query = LicenseFilter::applyTo($request, $query);
			$query = LanguagesFilter::applyTo($request, $query);

			// perform query
			//
			$count = $query->count();
			// if ($count) {
				$nums[$year] = $count;
			// }
		}

		return $nums;
	}

	/**
	 * Get the repository metric counts.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return integer
	 */
	public static function getCounts(Request $request) {
		$query = GitLabProject::query();

		// apply filters
		//
		$query = DateFilter::applyTo($request, $query);

		return [
			'all' => $query->clone()->count(),
			'descriptions' => $query->clone()->whereNotNull('description')->count(),
			'readmes' => $query->clone()->whereNotNull('readme_url')->count(),
			'readme_images' => $query->clone()->where('readme_has_images', '=', 1)->count(),
			'licenses' => $query->clone()->whereNotNull('license_key')->count(),

			'stars' => $query->clone()->where('star_count', '>', 0)->count(),
			'forks' => $query->clone()->where('forks_count', '>', 0)->count(),
			'open_issues' => $query->clone()->where('open_issues_count', '>', 0)->count(),
		];
	}

	//
	// language querying methods
	//

	/**
	 * Get project languages.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return string[]
	 */
	public static function getLanguages(Request $request) {

		// create query
		//
		$query = GitLabProject::whereNotNull('languages');

		// apply filters
		//
		$query = DateFilter::applyTo($request, $query);
		$query = LicenseFilter::applyTo($request, $query);

		// get languages from projects
		//
		$languages = [];
		$projects = $query->get();
		for ($i = 0; $i < count($projects); $i++) {
			$project = $projects[$i];
			$projectLanguages = explode(',', $project['languages']);

			// find primary language
			//
			$projectLanguage = $projectLanguages[0];

			// strip version from language
			//
			$language = explode(':', $projectLanguage)[0];

			// add language to list
			//
			if (!in_array($language, $languages)) {
				array_push($languages, $language);
			}
		}
		sort($languages);

		// perform query
		//
		return $languages;
	}

	/**
	 * Get project language counts.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return Object
	 */
	public static function getLanguageCounts(Request $request) {
		$languages = self::getLanguages($request);

		$counts = [];
		foreach ($languages as $language) {

			// create query
			//
			$query = GitLabProject::where('languages', 'like', $language . '%');

			// apply filters
			//
			$query = DateFilter::applyTo($request, $query);
			$query = LicenseFilter::applyTo($request, $query);

			// perform query
			//
			$count = $query->count();
			if ($count) {
				$counts[$language] = $count;
			}
		}

		return $counts;
	}

	/**
	 * Get project language counts by year.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return string[]
	 */
	public static function getLanguageCountsByYear(Request $request) {
		$languages = self::getLanguages($request);
		$firstYear = intval(self::getFirstYear($request));
		$lastYear = intval(self::getLastYear($request));

		$years = [];
		for ($year = $firstYear; $year <= $lastYear; $year++) {
			$years[$year] = [];
			foreach ($languages as $language) {

				// create query
				//
				$query = GitLabProject::where('created_at', '>', strval($year) . '-01-01 00:00:00')
					->where('created_at', '<', strval($year + 1) . '-01-01 00:00:00')
					->where('languages', 'like', $language . '%');

				// apply filters
				//
				$query = LicenseFilter::applyTo($request, $query);

				// perform query
				//
				$count = $query->count();
				if ($count) {
					$years[$year][$language] = $count;
				}
			}
		}

		return $years;
	}

	//
	// license querying methods
	//

	/**
	 * Get project licenses.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return string[]
	 */
	public static function getLicenses(Request $request) {

		// create query
		//
		$query = GitLabProject::whereNotNull('license_key')->select('license_key')->distinct();

		// apply filters
		//
		$query = DateFilter::applyTo($request, $query);
		$query = LanguagesFilter::applyTo($request, $query);

		// perform query
		//
		$licenses = $query->get()->pluck('license_key')->toArray();
		sort($licenses);

		return $licenses;
	}

	/**
	 * Get project license counts.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return Object
	 */
	public static function getLicenseCounts(Request $request) {
		$licenses = self::getLicenses($request);
		$counts = [];

		foreach ($licenses as $license) {

			// create query
			//
			$query = GitLabProject::where('license_key', '=', $license);

			// apply filters
			//
			$query = DateFilter::applyTo($request, $query);
			$query = LanguagesFilter::applyTo($request, $query);

			$counts[$license] = $query->count();
		}

		return $counts;
	}

	/**
	 * Get project license counts by year.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return string[]
	 */
	public static function getLicenseCountsByYear(Request $request) {
		$licenses = self::getLicenses($request);
		$firstYear = intval(self::getFirstYear($request));
		$lastYear = intval(self::getLastYear($request));

		$years = [];
		for ($year = $firstYear; $year <= $lastYear; $year++) {
			$years[$year] = [];
			foreach ($licenses as $license) {

				// create query
				//
				$query = GitLabProject::where('created_at', '>', strval($year) . '-01-01 00:00:00')
					->where('created_at', '<', strval($year + 1) . '-01-01 00:00:00')
					->where('license_key', '=', $license);

				// apply filters
				//
				$query = LanguagesFilter::applyTo($request, $query);

				// perform query
				//
				$count = $query->count();
				if ($count) {
					$years[$year][$license] = $count;
				}
			}
		}

		return $years;
	}

	//
	// year querying methods
	//

	/**
	 * Get project first year.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return string[]
	 */
	public static function getFirstYear(Request $request) {

		// create query
		//
		$first = GitLabProject::orderBy('created_at', 'ASC')->first();

		// extract year
		//
		return date("Y", strtotime($first->created_at));
	}

	/**
	 * Get project last year.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @return string[]
	 */
	public static function getLastYear(Request $request) {

		// create query
		//
		$first = GitLabProject::orderBy('created_at', 'DESC')->first();

		// extract year
		//
		return date("Y", strtotime($first->created_at));
	}
}