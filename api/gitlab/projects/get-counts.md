# API

## GET /gitlab/projects/counts

Get the counts of GitLab projects by feature. 

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| year | integer | The year that the GitLab projects were created. |
| before | integer | The last year that the GitLab projects were created. |
| after | integer | The first year that the GitLab projects were created. |

### Return Type

object

### Example

- Get the counts of GitLab projects written in the year 2020.
```
GET /gitlab/repositories/counts?year=2020
```