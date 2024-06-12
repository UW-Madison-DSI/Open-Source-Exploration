# API

## GET /gitlab/projects/languages/counts/year

Get the number of GitLab projects in each langauge by year.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string | The licensing terms of the GitLab projects. |

### Return Type

object

### Example

- Get the counts of languages for each year for GitLab projects with the MIT license.
```
GET /gitlab/projects/languages/counts/year?license=mit&year=2020
```