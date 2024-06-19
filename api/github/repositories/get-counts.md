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

| Attribute | Type | Description |
| --- | --- | --- |
| all | integer | The number of GitHub repositories. |
| descriptions | integer | The number of GitHub repositories with descriptions. |
| readmes | integer | The number of GitHub repositories with READMEs. |
| readme_images | integer | The number of GitHub repositories with READMEs containing images. |
| licenses | integer | The number of GitHub repositories with licenses. |
| homepages | integer | The number of GitHub repositories with homepages. |
| stargazers | integer | The number of GitHub repositories with stargazers. |
| watchers | integer | The number of GitHub repositories with watchers. |
| forks | integer | The number of GitHub repositories with forks. |
| open_issues | integer | The number of GitHub repositories with open issues. |

### Example

- Get the counts of GitHub repositories written in the year 2020.
```
GET /github/repositories/counts?year=2020
```