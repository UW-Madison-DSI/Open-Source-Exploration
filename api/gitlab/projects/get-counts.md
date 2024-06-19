# API

## GET /gitlab/projects/counts

Get the counts of GitLab projects by feature. 

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| year | integer | The year that the GitLab projects were created. |
| before | integer | The last year that the GitLab projects were created. |
| after | integer | The first year that the GitLab projects were created. |

### Return Type

object

| Attribute | Type | Description |
| --- | --- | --- |
| all | integer | The total number of GitLab projects. |
| descriptions | integer | The number of GitLab projects with descriptions. |
| readmes | integer | The number of GitLab projects with READMEs. |
| readme_images | integer | The number of GitLab projects with READMEs containing images. |
| licenses | integer | The number of GitLab projects with licenses. |
| stars | integer | The number of GitLab projects with stars. |
| forks | integer | The number of GitLab projects with forks. |
| open_issues | integer | The number of GitLab projects with open issues. |

### Example

- Get the counts of GitLab projects written in the year 2020.
```
GET /gitlab/repositories/counts?year=2020
```