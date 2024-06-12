# API

## GET /github/repositories/licenses/counts/year

Get the number of GitHub repositories in each langauge by year.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| language | string | The primary language that the GitHub repositories are written in. |

### Return Type

object

### Example

- Get the counts of licenses for each year for GitHub repositories written in python.
```
GET /github/repositories/languages/counts/year?language=python
```