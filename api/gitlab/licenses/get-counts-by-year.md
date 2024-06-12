# API

## GET /gitlab/projects/licenses/counts/year

Get the number of GitLab projects in each langauge by year.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| language | string | The primary language that the GitLab projects are written in. |

### Return Type

object

### Example

- Get the counts of licenses for each year for GitLab projects written in python.
```
GET /gitlab/projects/languages/counts/year?language=python
```