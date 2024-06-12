# API

## GET /github/repositories/languages/counts/year

Get the number of GitHub repositories in each langauge by year.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string | The licensing terms of the GitHub repositories. |

### Return Type

object

### Example

- Get the counts of languages for each year for GitHub repositories with the MIT license.
```
GET /github/repositories/languages/counts/year?license=mit&year=2020
```