# API

## GET /github/repositories/languages/counts

Get the number of GitHub repositories by langauge.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string | The licensing terms of the GitHub repositories. |
| year | integer | The year that the GitHub repositories were created. |
| before | integer | The last year that the GitHub repositories were created. |
| after | integer | The first year that the GitHub repositories were created. |

### Return Type

object

### Example

- Get the counts of languages used for GitHub repositories with the MIT license in the year 2020.
```
GET /github/repositories/languages/counts?license=mit&year=2020
```