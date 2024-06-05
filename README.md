<p align="center">
	<div align="center">
        <img src="./images/logos/uw-crest.png" alt="University of Wisconsin Logo" style="height:150px">
		<img src="./images/logos/open-source.svg" alt="Open Source Logo" style="height:150px">
	</div>
</p>

# UW Open Source Exploration

This project is means of exploring open source activity associated with university of Wisconsin-Madison.

The project contains scripts for downloading information from GitHub and GitLab about open source projects and people and storing this information in a database for further analysis.

## Requirements

To run the code in this project, you will need the following:

- A SQL Database - MySQL, MariaDB etc.
- Python3 or PHP

## Installation

Before running the scripts in this project, you will need to create a database to store the data as described [here](INSTALL.md).

## Configuration

Before running the scripts in this project, you will need to configure your code to use GitHub / GitLab access tokens as described [here](CONFIGURE.md).

## Running

Once you have created a database and have configured the code with your access tokens, you are ready to run the scripts. 

<pre>
src/
│
├── github/
│   ├── bash/
│   ├── php/
│   ├── python/
│   └── sql/
│ 
└── gitlab/
    ├── bash/
    ├── python/
    └── sql/
</pre>

### GitHub

The following scripts are provided to fetch and store information from GitHub:

#### <img width="20px" src="./images/logos/bash-logo.svg" style="float:left; margin-right:10px" />Bash

The following Bash scripts are provided in the directory 'src/github/bash' to download data from GitHub in json format.  These scripts do not store the data in the database but are provided in order to show the structure of the json that is returned.

- fetch_dsi_repositories.sh

This script is used to fetch information about repositories owned by the Data Science Institute.

- fetch_repositories.sh

This script is used to fetch information about repositories related to the keyword "Wisconsin" created in 2024.

- fetch_users.sh

This script is used to fetch information about users related to "wisc.edu".

#### <img width="20" src="./images/logos/python-logo.svg" style="float:left; margin-right:10px" />Python

The following Python scripts are provided in the directory 'src/github/python' to download and store data from GitHub in the database. 

- fetch_dsi_repositories.py

This script is used to fetch and store information in the database about repositories owned by the Data Science Institute.

- fetch_repositories.py

This script is used to fetch and store information in the database about all repositories related to the keyword "Wisconsin".

- fetch_repository.py

This script is used to fetch and store information in the database about a single repository.

#### <img width="30px" src="./images/logos/php-logo.svg" style="float:left; margin-right:10px" />PHP

The following PHP scripts are provided in the directory 'src/github/php' to download and store data from GitHub in the database. 

- fetch_dsi_repositories.php

This script is used to fetch and store information in the database about repositories owned by the Data Science Institute.

- fetch_repositories.php

This script is used to fetch and store information in the database about all repositories related to the keyword "Wisconsin".

- fetch_users.php

This script is used to fetch and store information in the database about users related to the keyword "Wisconsin".

### GitLab

The following scripts are provided to fetch and store information from GitLab:

#### <img width="20px" src="./images/logos/bash-logo.svg" style="float:left; margin-right:10px" />Bash

The following Bash scripts are provided in the directory 'src/gitlab/bash' to download data from GitLab in json format.  These scripts do not store the data in the database but are provided in order to show the structure of the json that is returned.

- fetch_my_projects.sh

This script is used to fetch information about projects belonging to a particular username.

- fetch_projects.sh

This script is used to fetch information about a single project.

- fetch_projects.sh

This script is used to fetch information about all UW projects.

#### <img width="20" src="./images/logos/python-logo.svg" style="float:left; margin-right:10px" />Python

The following Python scripts are provided in the directory 'src/gitlab/python' to download and store data from GitLab in the database. 

- fetch_project.py

This script is used to fetch and store information in the database about a single project.

- fetch_projects.py

This script is used to fetch and store information in the database about all UW projects.

## Sample Results

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

- number of repositories:
3028

- number that are not part of the Wisconsin breast Cancer dataset or CS Class repositories:
1748 = 58%

### Percentages of repositories with essential components

- number of repositories with a description:
2433 = 80%

- number of repositories with a README:
2185 = 72%

- number of repositories with an illustrated README:
256 = 8%

- number of repositories with a homepage:
151 = 5%

- number of repositories with a license:
436 = 14%

### Percentages of repositories with multiple essential components

- number that have a description and a README:
1111 = 37%

- number that have a description, and an illustrated README:
149 = 5%

- number that have a description, a README and a homepage:
84 = 3%

- number that have a description, an illustrated README, and a license:
59 = 1.5%

- number that have a description, an illustrated README and a homepage:
31 = 1%

- number that have a description, an illustrated README, a homepage, and a license:
17 = 0.5%

<!-- LICENSE -->
## License

Distributed under the permissive MIT license. See the [license](./LICENSE.txt) for more information.

<!-- Acknowledgements -->
## Acknowledgements

This software was created by the [Data Science Institute](https://datascience.wisc.edu/) at the [University of Wisconsin-Madison](https://www.wisc.edu/)