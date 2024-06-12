# API

## GET /github/repositories/{id}

Get information about a particular GitHub repository.

### Parameters

This route requires the following parametrer:

| Parameter | Type | Description |
| --- | --- | --- |
| id | string | The id of the GitHub repository to get. |

### Return Type

object

### Example

- Get information about the "VisAD" GitHub repository from the UW's Space Science and Engineering Center.
```
GET /github/repositories/3453653
```