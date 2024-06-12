# API

## GET /github/repositories/num

Get the number of GitHub repositories. 

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string | The licensing terms of the GitHub repositories. |
| language | string | The primary language that the GitHub repositories are written in. |
| year | integer | The year that the GitHub repositories were created. |
| before | integer | The last year that the GitHub repositories were created. |
| after | integer | The first year that the GitHub repositories were created. |

### Return Type

integer

### Example

- Get the number of GitHub repositories written in python using the MIT license in the year 2020.
```
GET /github/repositories/num?language=python&license=mit&year=2020
```