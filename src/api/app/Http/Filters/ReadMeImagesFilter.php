<?php
/******************************************************************************\
|                                                                              |
|                             ReadmeImagesFilter.php                           |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a utility for filtering by README images.                |
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

class ReadMeImagesFilter
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
		if ($request->has('readme_images')) {

			// apply filter
			//
			switch ($request->input('readme_images')) {
				case 'true':
					$query = $query->where('readme_has_images', '=', 1);
					break;
				case 'false':
					$query = $query->where('readme_has_images', '=', 0);
					break;
			}
		}

		return $query;
	}
}