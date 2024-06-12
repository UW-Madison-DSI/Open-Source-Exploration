# Running

The instructions below describe how to run a set of scripts that will fetch information from the GitHub and GitLab API's and store it in a database.

<pre>
src/
│
├── api/
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

### <img width="20px" src="./images/logos/github-logo.svg" style="float:left; margin-right:10px" /> GitHub

The following scripts are provided to fetch and store information from GitHub:

#### <img width="20px" src="./images/logos/bash-logo.svg" style="float:left; margin-right:10px" /> Bash

The following [Bash scripts](./src/github/bash) are provided to download data from GitHub in json format.  These scripts do not store the data in the database but are provided in order to show the structure of the json that is returned.

| File | Description |
| --- | --- |
| [fetch_dsi_repositories.sh](./src/github/bash/fetch_dsi_repositories.sh) | This script is used to fetch information about repositories owned by the Data Science Institute. |
| [fetch_repositories.sh](./src/github/bash/fetch_repositories.sh) | This script is used to fetch information about repositories related to the keyword "Wisconsin" created in 2024. |
| [fetch_users.sh](./src/github/bash/fetch_users.sh) | This script is used to fetch information about users related to "wisc.edu". |

#### <img width="20" src="./images/logos/python-logo.svg" style="float:left; margin-right:10px" /> Python

The following [Python scripts](./src/github/python) are provided to download and store data from GitHub in the database. 

| File | Description |
| --- | --- |
| [fetch_dsi_repositories.py](./src/github/python/fetch_dsi_repositories.py) | This script is used to fetch and store information in the database about repositories owned by the Data Science Institute. |
| [fetch_repositories.py](./src/github/python/fetch_repositories.py) | This script is used to fetch and store information in the database about all repositories related to the keyword "Wisconsin". |
| [fetch_repository.py](./src/github/python/fetch_repository.py) | This script is used to fetch and store information in the database about a single repository. |

#### <img width="30px" src="./images/logos/php-logo.svg" style="float:left; margin-right:10px" /> PHP

The following [PHP scripts](./src/github/php) are provided to download and store data from GitHub in the database. 

| File | Description |
| --- | --- |
| [fetch_dsi_repositories.php](./src/github/php/fetch_dsi_repositories.php) | This script is used to fetch and store information in the database about repositories owned by the Data Science Institute. |
| [fetch_repositories.php](./src/github/php/fetch_repositories.php) | This script is used to fetch and store information in the database about all repositories related to the keyword "Wisconsin". |
| [fetch_users.php](./src/github/php/fetch_users.php) | This script is used to fetch and store information in the database about users related to the keyword "Wisconsin". |

### <img width="20px" src="./images/logos/gitlab-logo.svg" /> GitLab

The following scripts are provided to fetch and store information from GitLab:

#### <img width="20px" src="./images/logos/bash-logo.svg" /> Bash

The following [Bash scripts](./src/gitlab/bash) are provided to download data from GitLab in json format.  These scripts do not store the data in the database but are provided in order to show the structure of the json that is returned.

| File | Description |
| --- | --- |
| [fetch_my_projects.sh](./src/gitlab/bash/fetch_my_projects.sh) | This script is used to fetch information about projects belonging to a particular username. |
| [fetch_project.sh](./src/gitlab/bash/fetch_project.sh) | This script is used to fetch information about a single project. |
| [fetch_projects.sh](./src/gitlab/bash/fetch_projects.sh) | This script is used to fetch information about all UW projects. |

#### <img width="20" src="./images/logos/python-logo.svg" /> Python

The following [Python scripts](./src/gitlab/python) are provided to download and store data from GitLab in the database. 

| File | Description |
| --- | --- |
| [fetch_project.py](./src/gitlab/python/fetch_project.py) | This script is used to fetch and store information in the database about a single project. |
| [fetch_projects.py](./src/gitlab/python/fetch_projects.py) | This script is used to fetch and store information in the database about all UW projects. |