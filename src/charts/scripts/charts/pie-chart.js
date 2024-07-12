/******************************************************************************\
|                                                                              |
|                                 pie-chart.js                                 |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a set of charting utilities.                             |
|                                                                              |
|        Author(s): Abe Megahed                                                |
|                                                                              |
|        This file is subject to the terms and conditions defined in           |
|        'LICENSE.txt', which is part of this source code distribution.        |
|                                                                              |
|******************************************************************************|
|     Copyright (C) 2022, Data Science Institute, University of Wisconsin      |
\******************************************************************************/

//
// functions
//

function addAlpha(color, opacity) {

	// add alpha opacity to hex color
	//
	var _opacity = Math.round(Math.min(Math.max(opacity ?? 1, 0), 1) * 255);
	return color + _opacity.toString(16).toUpperCase();
}

//
// plotting functions
//

function showPieChart(id, values, labels, options) {
	let plot = Plotly.newPlot(id, [
		{
			values: values,
			labels: labels,
			type: 'pie',
			marker: {
				colors: [options? addAlpha(options.color) : 'black', '#f0f0f0'],
				line: {
					color: options? options.color : undefined,
					width: 2
				}
			}
		}
	], {
		title: options? options.title : undefined,
		showlegend: false
	}, {
		displayModeBar: false
	});
}