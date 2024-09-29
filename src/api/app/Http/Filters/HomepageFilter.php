<?php
/******************************************************************************\
|                                                                              |
|                               HomepageFilter.php                             |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a utility for filtering by homepage.                     |
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

class HomepageFilter
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
		if ($request->has('homepage')) {

			// apply filter
			//
			switch ($request->input('homepage')) {
				case 'true':
					$query = $query->whereNotNull('homepage');
					break;
				case 'false':
					$query = $query->whereNull('homepage');
					break;
			}
		}

		return $query;
	}
}