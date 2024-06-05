# Configuration

To run the code in this project, you will need to first obtain GitHub and/or GitLab personal access tokens and then you will need to configure your code to use them.

## Obtain Access Tokens
See these resources for details on how to obtain these tokens:

### <img width="20px" src="./images/logos/github-logo.svg" /> GitHub

https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/managing-your-personal-access-tokens

### <img width="20px" src="./images/logos/gitlab-logo.svg" /> GitLab

https://docs.gitlab.com/ee/user/project/settings/project_access_tokens.html

Once you have your access tokens, you will need to add them to your code.

## Configure Code to use Access Tokens
Next, you will need to configure your code to use these access tokens.

### <img width="20px" src="./images/logos/github-logo.svg" /> GitHub
Replace the placeholder "YOURGITHUBTOKENHERE" in the following files:

#### <img width="20px" src="./images/logos/bash-logo.svg" /> Bash
In the directory "src/github/bash":
- fetch_dsi_repositories.sh
- fetch_repositories.sh
- fetch_dsi_users.sh

#### <img width="20px" src="./images/logos/python-logo.svg" /> Python
In the directory "src/github/python":
- models/github.py

#### <img width="30px" src="./images/logos/php-logo.svg" /> PHP
In the directory "src/github/php":
- models/github.php

### <img width="20px" src="./images/logos/gitlab-logo.svg" /> GitLab
Replace the placeholder "YOURGITLABTOKENHERE" in the following files:

#### <img width="20px" src="./images/logos/bash-logo.svg" /> Bash
In the directory "src/gitlab/bash":
- fetch_my_projects.sh
- fetch_project.sh
- fetch_projects.sh

#### <img width="20px" src="./images/logos/python-logo.svg" /> Python
In the directory "src/gitlab/python":
- models/gitlab.py

#### <img width="30px" src="./images/logos/php-logo.svg" /> PHP
In the directory "src/gitlab/php":
- models/gitlab.php