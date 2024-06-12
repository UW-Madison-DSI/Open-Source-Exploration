<p align="center">
	<div align="center">
        <img src="./images/logos/uw-crest.png" alt="University of Wisconsin Logo" style="height:150px">
		<img src="./images/logos/open-source.svg" alt="Open Source Logo" style="height:150px">
	</div>
</p>

# UW Open Source Exploration

This project is means of exploring open source activity associated with university of Wisconsin-Madison.

The project contains scripts for downloading information from GitHub and GitLab about open source projects and people and storing this information in a database for further analysis and includes a [REST API](./api/API.md) for retreiving this information.

## Data

Results data in a variety of formats are contained in the following directories:

<pre>
data/
│
├── github/
│   ├── csv/
│   ├── json/
│   └── sql/
│ 
└── gitlab/
    ├── csv/
    ├── json/
    └── sql/
</pre>

Below are some sample findings from GitHub about respositories related to "Wisconsin":

| Description | Count | Percent |
| --- | --- | --- |
| All repositories | 3028 | 100% |
| Repositories that are not part of the Wisconsin breast Cancer dataset or CS classes | 1748 | 58% |

### Repositories containing essential components

| Component | Count | Percent |
| --- | --- | --- |
| Description | 2433 | 80% |
| README | 2185 | 72% |
| README Images | 256 | 8% |
| Homepage | 151 | 5% |
| License | 436 | 14% |

### Repositories containing multiple essential components

| Description | README | README Images | License | Homepage | Count | Percent |
| --- | --- | --- | --- | --- | --- | --- |
| &check; | &check; |     |     |     | 1111 | 37% |
| &check; | &check; | &check; |     |     | 149 | 5% |
| &check; | &check; |     |     | &check; | 84 | 3% |
| &check; | &check; | &check; | &check; |     | 59 | 1.5% |
| &check; | &check; | &check; |     | &check; | 31 | 1% |
| &check; | &check; | &check; | &check; | &check; | 17 | 0.5% |

## Requirements

To run the code in this project, you will need the following:

- A SQL Database - MySQL, MariaDB etc.
- Python3 or PHP

## Installation

Before running the scripts in this project, you will need to create a database to store the data as described [here](INSTALL.md).

## Configuration

Before running the scripts in this project, you will need to configure your code to use GitHub / GitLab access tokens as described [here](CONFIGURE.md).

## Running

Once you have created a database and have configured the code with your access tokens, you are ready to run the data collection scripts as described [here](RUNNING.md).

<!-- LICENSE -->
## License

Distributed under the permissive MIT license. See the [license](./LICENSE.txt) for more information.

<!-- Acknowledgements -->
## Acknowledgements

This software was created by the [Data Science Institute](https://datascience.wisc.edu/) at the [University of Wisconsin-Madison](https://www.wisc.edu/)