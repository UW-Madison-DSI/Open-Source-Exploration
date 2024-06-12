# API

## GET /github/repositories/licenses

Get a list of the licenses used in GitHub repositories.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| language | string | The primary language that the GitHub repositories are written in. |
| year | integer | The year that the GitHub repositories were created. |
| before | integer | The last year that the GitHub repositories were created. |
| after | integer | The first year that the GitHub repositories were created. |

### Return Type

array of strings

### Example

- Get the languages used for GitHub repositories with the MIT license in the year 2020.
```
GET /github/repositories/languages?license=mit&year=2020
```