# API

## GET /gitlab/projects/languages/counts

Get the number of GitLab projects by langauge.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string | The licensing terms of the GitLab projects. |
| year | integer | The year that the GitLab projects were created. |
| before | integer | The last year that the GitLab projects were created. |
| after | integer | The first year that the GitLab projects were created. |

### Return Type

object

### Example

- Get the counts of languages used for GitLab projects with the MIT license in the year 2020.
```
GET /gitlab/projects/languages/counts?license=mit&year=2020
```