# API

## GET /github/repositories/num/year

Get the number of GitHub repositories per year. 

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string | The licensing terms of the GitHub repositories. |
| language | string | The primary language that the GitHub repositories are written in. |

### Return Type

object

### Example

- Get the number of GitHub repositories per year written in python:
```
GET /github/repositories/num/year?language=python
```