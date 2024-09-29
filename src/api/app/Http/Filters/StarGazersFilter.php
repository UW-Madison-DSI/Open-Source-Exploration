<?php
/******************************************************************************\
|                                                                              |
|                             StarGazersFilter.php                             |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a utility for filtering by stargazers.                   |
|                                                                              |
|        Author(s): Abe Megahed                                                |
|                                                                              |
|        This file is subject to the terms and conditions defined in           |
|        'LICENSE.txt', which is part of this source code distribution.        |
|                                                                              |
|******************************************************************************|
|     Copyright (C) 2024, Data Science Institute, University of Wisconsin      |
\******************************************************************************/

namespace App\Http\Filters;

use Illuminate\Http\Request;

class StarGazersFilter
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
		if ($request->has('stargazers')) {
			$stargazers = $request->input('stargazers');

			// apply filter
			//
			switch ($stargazers) {
				case 'true':
					$query = $query->where('stargazers_count', '>', 0);
					break;
				case 'false':
					$query = $query->where('stargazers_count', '=', 0);
					break;
				default:
					$query = $query->where('stargazers_count', '=', $stargazers);
					break;
			}
		}

		return $query;
	}
}