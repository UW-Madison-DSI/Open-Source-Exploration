# API

## GET /github/repositories/counts

Get the counts of GitHub repositories by feature. 

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| year | integer | The year that the GitHub repositories were created. |
| before | integer | The last year that the GitHub repositories were created. |
| after | integer | The first year that the GitHub repositories were created. |

### Return Type

object

### Example

- Get the counts of GitHub repositories written in the year 2020.
```
GET /github/repositories/counts?year=2020
```