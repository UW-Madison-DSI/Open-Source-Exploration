# API

## GET /gitlab/projects/licenses/counts

Get the number of GitLab projects by license.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| language | string | The primary language that the GitLab projects are written in. |
| year | integer | The year that the GitLab projects were created. |
| before | integer | The last year that the GitLab projects were created. |
| after | integer | The first year that the GitLab projects were created. |

### Return Type

object

### Example

- Get the counts of licenses used for GitLab projects using the python language in the year 2020.
```
GET /gitlab/projects/licenses/counts?language=python&year=2020
```