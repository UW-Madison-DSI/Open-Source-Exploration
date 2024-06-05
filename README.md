<p align="center">
	<div align="center">
        <img src="./images/logos/uw-crest.png" alt="University of Wisconsin Logo" style="width:20%">
		<img src="./images/logos/open-source.svg" alt="Open Source Logo" style="width:33%">
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
First, you will need to create databases to store the data.

### GitHub Database Installation

1. Create GitHub database

Create a database called "github" using your database editor or the command line.

2. Initialize GitHub database structure

Run the sql code contained in following sql files to create the database structure:

In the directory "src/github/sql":
- repositories.sql
- users.sql

### GitLab Database Installation

1. Create GitLab database

Create a database called "gitlab" using your database editor or the command line.

2. Initialize GitLab database structure

Run the sql code contained in following sql file to create the database structure:

- src/github/sql/projects.sql

## Configuration

To run the code in this project, you will need a GitHub and/or GitLab personal access token.  See these resources for details on how to obtain these tokens:

- GitHub
https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/managing-your-personal-access-tokens

- GitLab
https://docs.gitlab.com/ee/user/project/settings/project_access_tokens.html

Once you have your access tokens, you will need to add them to the code:

### GitHub Configuration
Replace the placeholder "YOURGITHUBTOKENHERE" in the following files:

#### Bash
In the directory "src/github/bash":
- fetch_dsi_repositories.sh
- fetch_repositories.sh
- fetch_dsi_users.sh

#### Python
In the directory "src/github/python":
- models/github.py

#### PHP
In the directory "src/github/php":
- models/github.php

### GitLab Configuration
Replace the placeholder "YOURGITLABTOKENHERE" in the following files:

#### Bash
In the directory "src/gitlab/bash":
- fetch_my_projects.sh
- fetch_project.sh
- fetch_projects.sh

#### Python
In the directory "src/gitlab/python":
- models/gitlab.py

#### PHP
In the directory "src/gitlab/php":
- models/gitlab.php

## Running

Once you have created a database and have configured the code with your access tokens, you are ready to run the scripts.  The following scripts are provided:

### GitHub

The following scripts are provided:

#### Bash

The following Bash scripts are provided ini the directory 'src/github/bash' to download data in json format.  These script do not store the data in the database but are provided in order to show the structure of the json that is returned.


- fetch_dsi_repositories.sh

This script is used to fetch information about repositories owned by the Data Science Institute.

- fetch_repositories.sh

This script is used to fetch information about repositories related to the keyword "Wisconsin" created in 2024.

- fetch_users.sh

This script is used to fetch information about users related to "wisc.edu".

#### Python

- fetch_dsi_repositories.py

This script is used to fetch and store information in the database about repositories owned by the Data Science Institute.

- fetch_repositories.py

This script is used to fetch and store information in the database about all repositories related to the keyword "Wisconsin".

- fetch_repository.py

This script is used to fetch and store information in the database about a single repository.

#### PHP

- fetch_dsi_repositories.php

This script is used to fetch and store information in the database about repositories owned by the Data Science Institute.

- fetch_repositories.php

This script is used to fetch and store information in the database about all repositories related to the keyword "Wisconsin".

- fetch_users.php

This script is used to fetch and store information in the database about users related to the keyword "Wisconsin".

### GitLab

The following scripts are provided:

#### Bash

The following Bash scripts are provided ini the directory 'src/gitlab/bash' to download data in json format.  These script do not store the data in the database but are provided in order to show the structure of the json that is returned.

- fetch_my_projects.sh

This script is used to fetch information about projects belonging to a particular username.

- fetch_projects.sh

This script is used to fetch information about a single project.

- fetch_projects.sh

This script is used to fetch information about all UW projects.

#### Python

- fetch_project.py

This script is used to fetch and store information in the database about a single project.

- fetch_projects.py

This script is used to fetch and store information in the database about all UW projects.

<!-- LICENSE -->
## License

Distributed under the permissive MIT license. See the [license](./LICENSE.txt) for more information.

<!-- Acknowledgements -->
## Acknowledgements

This software was created by the [American Family Insurance Data Science Institute](https://datascience.wisc.edu/) at the [University of Wisconsin-Madison](https://www.wisc.edu/) under a grant from [IRIS Hep](https://iris-hep.org/)