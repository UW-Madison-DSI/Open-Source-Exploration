<?php
/******************************************************************************\
|                                                                              |
|                               LicenseFilter.php                              |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a utility for filtering by license type.                 |
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

class LicenseFilter
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
		if ($request->has('license')) {
			$license = $request->input('license');

			// apply filter
			//
			switch ($license) {
				case 'true':
					$query = $query->whereNotNull('license_key');
					break;
				case 'false':
					$query = $query->whereNull('license_key');
					break;
				default:
					$query = $query->where('license_key', '=', $license);
					break;
			}
		}

		return $query;
	}
}