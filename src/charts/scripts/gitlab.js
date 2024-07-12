/******************************************************************************\
|                                                                              |
|                                   gitlab.js                                  |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines a set of GitLab charting utilities.                      |
|                                                                              |
|        Author(s): Abe Megahed                                                |
|                                                                              |
|        This file is subject to the terms and conditions defined in           |
|        'LICENSE.txt', which is part of this source code distribution.        |
|                                                                              |
|******************************************************************************|
|     Copyright (C) 2022, Data Science Institute, University of Wisconsin      |
\******************************************************************************/

function showGitLabProjects(id, baseUrl) {
	$.ajax({
		url: baseUrl + '/gitlab/projects/num/year',
		type: 'GET',

		// callbacks
		//
		success: (data) => {
			let keys = Object.keys(data);
			let values = getValues(data);

			// show chart
			//
			showBarChart(id, values, keys, {
				title: 'GitLab Projects By Year',
				color: '#E24329'
			});
		}
	});
}

function showGitLabProjectsByLicense(id, baseUrl) {
	$.ajax({
		url: baseUrl + '/gitlab/projects/licenses/counts',
		type: 'GET',

		// callbacks
		//
		success: (data) => {
			let keys = Object.keys(data);
			let values = getPercentages(data);

			// show chart
			//
			showBarChart(id, values, keys, {
				title: 'GitLab Projects By License',
				color: '#E24329'
			});
		}
	});
}

function showGitLabProjectsByLanguage(id, baseUrl) {
	$.ajax({
		url: baseUrl + '/gitlab/projects/languages/counts',
		type: 'GET',

		// callbacks
		//
		success: (data) => {
			let keys = Object.keys(data);
			let values = getPercentages(data);

			// show chart
			//
			showBarChart(id, values, keys, {
				title: 'GitLab Projects By Language',
				color: '#E24329'
			});
		}
	});
}

function showGitLabProjectsByFeatures(id, baseUrl) {
	$.ajax({
		url: baseUrl + '/gitlab/projects/counts',
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
				title: 'GitLab Projects By Features',
				color: '#E24329',
				maxY: 100
			});
		}
	});
}

function showGitLab(baseUrl) {
	showGitLabProjects('gitlab1', baseUrl);
	showGitLabProjectsByLicense('gitlab2', baseUrl);
	showGitLabProjectsByLanguage('gitlab3', baseUrl);
	showGitLabProjectsByFeatures('gitlab4', baseUrl);
}