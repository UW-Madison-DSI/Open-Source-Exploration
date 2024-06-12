# API

## <img width="20px" src="../images/logos/github-logo.svg" /> GitHub

### Repository Querying Routes

The following routes are used to query information about GitHub repositories.

| Method | Route | Description |
| --- | --- | --- |
| GET | [/github/repositories](./github/repositories/get.md) | Get all GitHub repositories. |
| GET | [/github/repositories/num](./github/repositories/get-num.md) | Get the number of GitHub repositories.  |
| GET | [/github/repositories/num/year](./github/repositories/get-num-by-year.md) | Get the number of GitHub repositories per year.  |
| GET | [/github/repositories/{id}](./github/repositories/get-by-id.md) | Get information about a particular GitHub repository. |

### Language Querying Routes

The following routes are used to query information about the languages that are used in GitHub repositories.

| Method | Route | Description |
| --- | --- | --- |
| GET | [/github/repositories/languages](./github/languages/get.md) | Get a list of the languages used in GitHub repositories. |
| GET | [/github/repositories/languages/counts](./github/languages/get-counts.md) | Get the number of GitHub repositories by langauge. |
| GET | [/github/repositories/languages/counts/year](./github/languages/get-counts-by-year.md) | Get the number of GitHub repositories in each language by year. |

### License Querying Routes

The following routes are used to query information about the licenses that are used in GitHub repositories.

| Method | Route | Description |
| --- | --- | --- |
| GET | [/github/repositories/licenses](./github/licenses/get.md) | Get a list of the licenses used in the GitHub repositories. |
| GET | [/github/repositories/licenses/counts](./github/licenses/get-counts.md) | Get the number of GitHub repositories by license. |
| GET | [/github/repositories/licenses/counts/year](./github/licenses/get-counts-by-year.md) | Get the number of GitHub repositories with each license by year. |

## <img width="20px" src="../images/logos/gitlab-logo.svg" /> GitLab

### Project Querying Routes

The following routes are used to query information about GitLab projects.

| Method | Route | Description |
| --- | --- | --- |
| GET | [/gitlab/projects](./gitlab/projects/get.md) | Get all GitLab projects. |
| GET | [/gitlab/projects/num](./gitlab/projects/get-num.md) | Get the number of GitLab projects.  |
| GET | [/gitlab/projects/num/year](./gitlab/projects/get-num-by-year.md) | Get the number of GitLab projects per year.  |
| GET | [/gitlab/projects/{id}](./gitlab/projects/get-by-id.md) | Get information about a particular GitLab project. |

### Language Querying Routes

The following routes are used to query information about the languages that are used in GitLab projects.

| Method | Route | Description |
| --- | --- | --- |
| GET | [/gitlab/projects/languages](./gitlab/languages/get.md) | Get a list of the languages used in GitLab projects. |
| GET | [/gitlab/projects/languages/counts](./gitlab/languages/get-counts.md) | Get the number of GitLab projects by langauge. |
| GET | [/gitlab/projects/languages/counts/year](./gitlab/languages/get-counts-by-year.md) | Get the number of GitLab projects in each language by year. |

### License Querying Routes

The following routes are used to query information about the licenses that are used in GitLab projects.

| Method | Route | Description |
| --- | --- | --- |
| GET | [/gitlab/projects/licenses](./gitlab/licenses/get.md) | Get a list of the licenses used in GitLab projects. |
| GET | [/gitlab/projects/licenses/counts](./gitlab/licenses/get-counts.md) | Get the number of GitLab projects by license. |
| GET | [/gitlab/projects/licenses/counts/year](./gitlab/licenses/get-counts-by-year.md) | Get the number of GitLab projects with each license by year. |
