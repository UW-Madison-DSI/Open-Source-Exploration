# API

## GET /gitlab/projects/licenses

Get a list of the licenses used in GitLab projects.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| language | string | The primary language that the GitLab projects are written in. |
| year | integer | The year that the GitLab projects were created. |
| before | integer | The last year that the GitLab projects were created. |
| after | integer | The first year that the GitLab projects were created. |

### Return Type

array of strings

### Example

- Get the languages used for GitLab projects with the MIT license in the year 2020.
```
GET /gitlab/projects/languages?license=mit&year=2020
```