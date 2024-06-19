<?php
/******************************************************************************\
|                                                                              |
|                             OpenIssuesFilter.php                             |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a utility for filtering by open issues.                  |
|                                                                              |
|        Author(s): Abe Megahed                                                |
|                                                                              |
|        This file is subject to the terms and conditions defined in           |
|        'LICENSE.txt', which is part of this source code distribution.        |
|                                                                              |
|******************************************************************************|
|            Copyright (C) 2016-2024, Sharedigm, www.sharedigm.com             |
\******************************************************************************/

namespace App\Http\Filters;

use Illuminate\Http\Request;

class OpenIssuesFilter
{
	/**
	 * Apply filter to query.
	 *
	 * @param Illuminate\Http\Request $request - the Http request object
	 * @param Illuminate\Database\Query\Builder $query - the query to apply filters to
	 * @return Illuminate\Database\Query\Builder
	 */
	static function applyTo(Request $request, $query) {

		// parse parameters
		//
		if ($request->has('open_issues')) {
			$openIssues =  $request->input('open_issues');

			// apply filter
			//
			switch ($openIssues) {
				case 'true':
					$query = $query->where('open_issues_count', '>', 0);
					break;
				case 'false':
					$query = $query->where('open_issues_count', '=', 0);
					break;
				default:
					$query = $query->where('open_issues_count', '=', $openIssues);
					break;
			}
		}

		return $query;
	}
}