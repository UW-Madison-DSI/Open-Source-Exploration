/******************************************************************************\
|                                                                              |
|                                    chart.js                                  |
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

function toTitleCase(str) {
	return str.replace(/\w\S*/g,
		text => text.charAt(0).toUpperCase() + text.substring(1).toLowerCase()
	);
}

function getLabels(data) {

	// get values from object
	//
	let keys = Object.keys(data);
	for (let i = 0; i < keys.length; i++) {
		keys[i] = toTitleCase(keys[i].replace(/_/g, ' '));
	}

	return keys;
}

function getValues(data) {

	// get values from object
	//
	let keys = Object.keys(data);
	let values = [];
	for (let i = 0; i < keys.length; i++) {
		values.push(data[keys[i]]);
	}

	return values;
}

function toPercent(values) {
	let total = 0;
	for (let i = 0; i < values.length; i++) {
		total += values[i];
	}
	for (let i = 0; i < values.length; i++) {
		values[i] = Math.round(values[i] / total * 100) + '%';
	}
	return values;
}

function getPercentages(data) {
	let values = getValues(data);
	values = toPercent(values);
	return values;
}

function addAlpha(color, opacity) {

	// add alpha opacity to hex color
	//
	var _opacity = Math.round(Math.min(Math.max(opacity ?? 1, 0), 1) * 255);
	return color + _opacity.toString(16).toUpperCase();
}

//
// plotting functions
//

function showBarChart(id, values, labels, options) {
	element = document.getElementById(id);
	let plot = Plotly.newPlot(id, [
		{
			x: labels,
			y: values,
			type: 'bar',
			orientation: 'v',
			marker: {
				color: options? addAlpha(options.color, 0.75) : undefined,
				line: {
					color: options? options.color : undefined,
					width: 2
				}
			}
		}
	], {
		title: options? options.title : undefined,
		showlegend: false,
		barcornerradius: 5,
		hoverlabel: {
			bgcolor: options? options.color : undefined,
			font: {
				color: 'white'
			}
		},
		xaxis: {
            showticklabels: true,
            type: 'category',
            dtick: 1
		},
		yaxis: {
			range: options && options.maxY? [0, options.maxY]: undefined,
			ticksuffix: values[1].includes && values[1].includes('%')? '%' : undefined
		},
		width: element.parentNode.clientWidth
	}, {
		displayModeBar: false
	});
}