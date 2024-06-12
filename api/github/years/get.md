# API

## GET /github/repositories/years

Get the years represented in the collection of GitHub repositories.

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string | The licensing terms of the GitHub repositories. |
| language | string | The primary language that the GitHub repositories are written in. |


### Return Type

array of integers

### Example

- Get the list of years for GitHub repositories with the MIT license written in python.
```
GET /github/repositories/years?license=mit&language=python
```