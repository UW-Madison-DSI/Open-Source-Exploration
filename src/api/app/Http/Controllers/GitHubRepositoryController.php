<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GitHubRepository;
use App\Http\Filters\YearFilter;
use App\Http\Filters\LimitFilter;
use App\Http\Filters\LicenseFilter;
use App\Http\Filters\LanguageFilter;

class GitHubRepositoryController extends Controller
{

    //
    // getting methods
    //

    /**
     * Get a particular repository
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return App\Models\Repository
     */
    public static function getIndex(Request $request, string $id) {

        // find repository by id
        //
        $repository = GitHubRepository::find($id);

        // check if found
        //
        if (!$repository) {
            return response("GitHub repository not found.", 404);
        }

        return $repository;
    }

    /**
     * Get repositories
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return App\Models\Repository[]
     */
    public static function getAll(Request $request) {

        // create query
        //
        $query = GitHubRepository::query();

        // apply filters
        //
        $query = YearFilter::applyTo($request, $query);
        $query = LimitFilter::applyTo($request, $query);
        $query = LicenseFilter::applyTo($request, $query);
        $query = LanguageFilter::applyTo($request, $query);

        // perform query
        //
        return $query->get();
    }

    /**
     * Get the number of repositories
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return integer
     */
    public static function getNum(Request $request) {

        // create query
        //
        $query = GitHubRepository::query();

        // apply filters
        //
        $query = YearFilter::applyTo($request, $query);
        $query = LicenseFilter::applyTo($request, $query);
        $query = LanguageFilter::applyTo($request, $query);

        // perform query
        //
        return $query->count();
    }

    //
    // language querying methods
    //

    /**
     * Get languages
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return string[]
     */
    public static function getLanguages(Request $request) {

        // create query
        //
        $query = GitHubRepository::whereNotNull('language')->select('language')->distinct();

        // apply filters
        //
        $query = YearFilter::applyTo($request, $query);
        $query = LicenseFilter::applyTo($request, $query);

        // perform query
        //
        return $query->get()->pluck('language');
    }

    /**
     * Get language counts
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return Object
     */
    public static function getLanguageCounts(Request $request) {
        $languages = self::getLanguages($request);

        $counts = [];
        for ($j = 0; $j < count($languages); $j++) {
            $language = $languages[$j];
            $query = GitHubRepository::where('language', '=', $language);

            // apply filters
            //
            $query = YearFilter::applyTo($request, $query);
            $query = LicenseFilter::applyTo($request, $query);

            $counts[$language] = $query->count();
        }

        return $counts;
    }

    /**
     * Get language counts by year
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return string[]
     */
    public static function getLanguageCountsByYear(Request $request) {
        $languages = self::getLanguages($request);
        $firstYear = intval(self::getFirstYear($request));
        $lastYear = intval(self::getLastYear($request));

        $years = [];
        for ($year = $firstYear; $year < $lastYear; $year++) {
            $years[$year] = [];
            for ($j = 0; $j < count($languages); $j++) {
                $language = $languages[$j];
                $query = GitHubRepository::where('year', '=', $year)
                    ->where('language', '=', $language);

                // apply filters
                //
                $query = LicenseFilter::applyTo($request, $query);

                $years[$year][$language] = $query->count();
            }
        }

        return $years;
    }

    //
    // license querying methods
    //

    /**
     * Get licenses
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return string[]
     */
    public static function getLicenses(Request $request) {

        // create query
        //
        $query = GitHubRepository::whereNotNull('license_key')->select('license_key')->distinct();

        // apply filters
        //
        $query = YearFilter::applyTo($request, $query);
        $query = LanguageFilter::applyTo($request, $query);

        // perform query
        //
        return $query->get()->pluck('license_key');
    }

    /**
     * Get license counts
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return Object
     */
    public static function getLicenseCounts(Request $request) {
        $licenses = self::getLicenses($request);

        $counts = [];
        for ($j = 0; $j < count($licenses); $j++) {
            $license = $licenses[$j];
            $query = GitHubRepository::where('license_key', '=', $license);

            // apply filters
            //
            $query = YearFilter::applyTo($request, $query);
            $query = LanguageFilter::applyTo($request, $query);

            $counts[$license] = $query->count();
        }

        return $counts;
    }

    /**
     * Get license counts by year
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return string[]
     */
    public static function getLicenseCountsByYear(Request $request) {
        $licenses = self::getLicenses($request);
        $firstYear = intval(self::getFirstYear($request));
        $lastYear = intval(self::getLastYear($request));

        $years = [];
        for ($year = $firstYear; $year < $lastYear; $year++) {
            $years[$year] = [];
            for ($j = 0; $j < count($licenses); $j++) {
                $license = $licenses[$j];
                $query = GitHubRepository::where('year', '=', $year)
                    ->where('license_key', '=', $license);

                // apply filters
                //
                $query = LanguageFilter::applyTo($request, $query);

                $years[$year][$license] = $query->count();
            }
        }

        return $years;
    }

    //
    // year querying methods
    //

    /**
     * Get years
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return string[]
     */
    public static function getYears(Request $request) {

        // create query
        //
        $query = GitHubRepository::select('year')->distinct();

        // apply filters
        //
        $query = LicenseFilter::applyTo($request, $query);
        $query = LanguageFilter::applyTo($request, $query);

        // perform query
        //
        return $query->get()->pluck('year');
    }

    /**
     * Get first year
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return string[]
     */
    public static function getFirstYear(Request $request) {

        // create query
        //
        $years = self::getYears($request);

        // perform query
        //
        return $years[0];
    }

    /**
     * Get last year
     *
     * @param Illuminate\Http\Request $request - the Http request object
     * @return string[]
     */
    public static function getLastYear(Request $request) {

        // create query
        //
        $years = self::getYears($request);

        // perform query
        //
        return $years[count($years) - 1];
    }
}