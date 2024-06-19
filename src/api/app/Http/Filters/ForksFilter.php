<?php
/******************************************************************************\
|                                                                              |
|                                ForksFilter.php                               |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a utility for filtering by forks.                        |
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

class ForksFilter
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
		if ($request->has('forks')) {
			$forks =  $request->input('forks');

			// apply filter
			//
			switch ($forks) {
				case 'true':
					$query = $query->where('forks_count', '>', 0);
					break;
				case 'false':
					$query = $query->where('forks_count', '=', 0);
					break;
				default:
					$query = $query->where('forks_count', '=', $forks);
					break;
			}
		}

		return $query;
	}
}