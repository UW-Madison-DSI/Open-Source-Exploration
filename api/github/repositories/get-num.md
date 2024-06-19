# API

## GET /github/repositories/num

Get the number of GitHub repositories. 

### Optional Parameters

This route accepts the following optional query string parameters:

| Parameter | Type | Description |
| --- | --- | --- |
| license | string or boolean| The licensing terms of the GitHub repositories. |
| language | string | The primary language that the GitHub repositories are written in. |
| year | integer | The year that the GitHub repositories were created. |
| before | integer | The last year that the GitHub repositories were created. |
| after | integer | The first year that the GitHub repositories were created. |
| readme | boolean | Whether or not the GitHub repositories contain READMEs. |
| readme_images | boolean | Whether or not the GitHub repositories contain README images. |
| description | boolean | Whether or not the GitHub repositories contain descriptions. |
| homepage | boolean | Whether or not the GitHub repositories contain homepages. |
| stargazers | boolean | Whether or not the GitHub repositories includes stargazers. |
| watchers | boolean | Whether or not the GitHub repositories includes watchers. |
| forks | boolean | Whether or not the GitHub repositories includes forks. |
| open_issues | boolean | Whether or not the GitHub repositories includes open issues. |

### Return Type

integer

### Example

- Get the number of GitHub repositories written in python containing READMEs using the MIT license in the year 2020.
```
GET /github/repositories/num?language=python&readme=true&license=mit&year=2020
```