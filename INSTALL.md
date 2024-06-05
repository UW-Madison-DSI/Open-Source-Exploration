<p align="center">
	<div align="center">
        <img src="./images/logos/uw-crest.png" alt="University of Wisconsin Logo" style="width:20%">
		<img src="./images/logos/open-source.svg" alt="Open Source Logo" style="width:33%">
	</div>
</p>

# Installation

## Database
First, you will need to create databases to store the data.

### GitHub Database

1. Create GitHub database

Create a database called "github" using your database editor or the command line.

2. Initialize GitHub database structure

Run the sql code contained in following sql files to create the database structure:

In the directory "src/github/sql":
- repositories.sql
- users.sql

### GitLab Database

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

