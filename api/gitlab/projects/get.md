# API

## GET /gitlab/projects

Get all GitLab projects.  

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| limit | integer | The maximum number of GitLab projects to return (default: 1000) |
| license | string | The licensing terms of the GitLab projects. |
| language | string | The primary language that the GitLab projects are written in. |
| year | integer | The year that the GitLab projects were created. |
| before | integer | The last year that the GitLab projects were created. |
| after | integer | The first year that the GitLab projects were created. |

### Return Type

array of objects

### Example

- Get all GitLab projects written in python using the MIT license in the year 2020:
```
GET /gitlab/projects?language=python&license=mit&year=2020
```