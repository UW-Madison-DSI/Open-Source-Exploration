# API

## GET /gitlab/projects/{id}

Get information about a particular GitLab project.

### Parameters

This route requires the following parametrer:

| Parameter | Type | Description |
| --- | --- | --- |
| id | string | The id of the GitLab project to get. |

### Return Type

object

### Example

- Get information about the "VisAD" GitLab project from the UW's Space Science and Engineering Center.
```
GET /gitlab/projects/3453653
```