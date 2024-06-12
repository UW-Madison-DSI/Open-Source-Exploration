# API

## GET /github/repositories/licenses/counts

Get the number of GitHub repositories by license.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| language | string | The primary language that the GitHub repositories are written in. |
| year | integer | The year that the GitHub repositories were created. |
| before | integer | The last year that the GitHub repositories were created. |
| after | integer | The first year that the GitHub repositories were created. |

### Return Type

object

### Example

- Get the counts of licenses used for GitHub repositories using the python language in the year 2020.
```
GET /github/repositories/licenses/counts?language=python&year=2020
```