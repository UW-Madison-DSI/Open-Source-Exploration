/******************************************************************************\
|                                                                              |
|                                   github.js                                  |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a set of GitHub charting utilities.                      |
|                                                                              |
|        Author(s): Abe Megahed                                                |
|                                                                              |
|        This file is subject to the terms and conditions defined in           |
|        'LICENSE.txt', which is part of this source code distribution.        |
|                                                                              |
|******************************************************************************|
|     Copyright (C) 2022, Data Science Institute, University of Wisconsin      |
\******************************************************************************/

function showGitHubRepositories(id, baseUrl) {
	$.ajax({
		url: baseUrl + '/github/repositories/num/year',
		type: 'GET',

		// callbacks
		//
		success: (data) => {
			let keys = Object.keys(data);
			let values = getValues(data);

			// show chart
			//
			showBarChart(id, values, keys, {
				title: 'GitHub Repositories By Year',
				color: '#5c6bc0'
			});
		}
	});
}

function showGitHubRepositoriesByLicense(id, baseUrl) {
	$.ajax({
		url: baseUrl + '/github/repositories/licenses/counts',
		type: 'GET',

		// callbacks
		//
		success: (data) => {
			let keys = Object.keys(data);
			let values = getPercentages(data);

			// show chart
			//
			showBarChart(id, values, keys, {
				title: 'GitHub Repositories By License',
				color: '#5c6bc0'
			});
		}
	});
}

function showGitHubRepositoriesByLanguage(id, baseUrl) {
	$.ajax({
		url: baseUrl + '/github/repositories/languages/counts',
		type: 'GET',

		// callbacks
		//
		success: (data) => {
			let keys = Object.keys(data);
			let values = getPercentages(data);

			// show chart
			//
			showBarChart(id, values, keys, {
				title: 'GitHub Repositories By Language',
				color: '#5c6bc0'
			});
		}
	});
}

function showGitHubRepositoriesByFeatures(id, baseUrl) {
	$.ajax({
		url: baseUrl + '/github/repositories/counts',
		type: 'GET',

		// callbacks
		//
		success: (data) => {
			let labels = getLabels(data);
			let values = getValues(data);

			// format labels
			//
			for (let i = 0; i < labels.length; i++) {
				labels[i] = labels[i].replace(/Readme/g, 'README');
				if (labels[i] != 'All') {
					labels[i] = 'with ' + labels[i];
				}
			}

			// convert to percent
			//
			let total = data['all'];
			for (let i = 0; i < values.length; i++) {
				values[i] = Math.round(values[i] / total * 100) + '%';
			}

			delete(labels[0]);
			delete(values[0]);

			// show chart
			//
			showBarChart(id, values, labels, {
				title: 'GitHub Repositories By Features',
				color: '#5c6bc0',
				maxY: 100
			});
		}
	});
}

function showGitHub(baseUrl) {
	showGitHubRepositories('github1', baseUrl);
	showGitHubRepositoriesByLicense('github2', baseUrl);
	showGitHubRepositoriesByLanguage('github3', baseUrl);
	showGitHubRepositoriesByFeatures('github4', baseUrl);
}