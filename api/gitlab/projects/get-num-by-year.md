# API

## GET /gitlab/projects/num/year

Get the number of GitLab projects per year. 

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string | The licensing terms of the GitLab projects. |
| language | string | The primary language that the GitLab projects are written in. |

### Return Type

object

### Example

- Get the number of GitLab projects per year written in python:
```
GET /gitlab/projects/num/year?language=python
```