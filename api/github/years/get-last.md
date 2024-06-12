# API

## GET /github/repositories/years/last

Get the last year for which we have a GitHub repository.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string | The licensing terms of the GitHub repositories. |
| language | string | The primary language that the GitHub repositories are written in. |


### Return Type

integer

### Example

- Get the last year for GitHub repositories with the MIT license written in python.
```
GET /github/repositories/years?license=mit&language=python
```