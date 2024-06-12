# API

## <img width="20px" src="../images/logos/github-logo.svg" /> GitHub

### Repository Querying Routes

The following routes are used to query information about repositories.

| Action | Route | Description |
| --- | --- | --- |
| GET | [/github/repositories](./github/repositories/get.md) | Get all GitHub repositories. |
| GET | [/github/repositories/num](./github/repositories/get-num.md) | Get the number of GitHub repositories.  |
| GET | [/github/repositories/num/year](./github/repositories/get-num-by-year.md) | Get the number of GitHub repositories per year.  |
| GET | [/github/repositories/{id}](./github/repositories/get-by-id.md) | Get information about a particular GitHub repository. |

### Language Querying Routes

The following routes are used to query information about the languages that are used in the repositories.

| Action | Route | Description |
| --- | --- | --- |
| GET | [/github/repositories/languages](./github/languages/get.md) | Get a list of the languages used in the GitHub repositories. |
| GET | [/github/repositories/languages/counts](./github/languages/get-counts.md) | Get the number of GitHub repositories by langauge. |
| GET | [/github/repositories/languages/counts/year](./github/languages/get-counts-by-year.md) | Get the number of GitHub repositories in each language by year. |

### License Querying Routes

The following routes are used to query information about the licenses that are used in the repositories.

| Action | Route | Description |
| --- | --- | --- |
| GET | [/github/repositories/licenses](./github/licenses/get.md) | Get a list of the licenses used in the GitHub repositories. |
| GET | [/github/repositories/licenses/counts](./github/licenses/get-counts.md) | Get the number of GitHub repositories by license. |
| GET | [/github/repositories/licenses/counts/year](./github/licenses/get-counts-by-year.md) | Get the number of GitHub repositories with each license by year. |
