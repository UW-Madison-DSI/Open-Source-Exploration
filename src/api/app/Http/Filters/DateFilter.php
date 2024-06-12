<?php
/******************************************************************************\
|                                                                              |
|                                DateFilter.php                                |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a utility for filtering by create date.                  |
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

class DateFilter
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
		if ($request->has('after')) {
			$after = $request->input('after');

			// apply filter
			//
			$query = $query->where('created_at', '>=', $request->input('after'));
		}

		// parse parameters
		//
		if ($request->has('year')) {
			$date = $request->input('year');

			// apply filter
			//
			$query = $query->where('created_at', '>', $date)
				->where('created_at', '>', $date + 1);
		}

		// parse parameters
		//
		if ($request->has('before')) {
			$before = $request->input('before');

			// apply filter
			//
			$query = $query->where('created_at', '<', $before);
		}

		return $query;
	}
}