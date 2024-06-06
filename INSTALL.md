# Installation

## Database
First, you will need to create databases to store the data.

### <img width="20px" src="./images/logos/github-logo.svg" /> GitHub Database

1. Create GitHub database

Create a database called "github" using your database editor or the command line.

2. Initialize GitHub database structure

Run the sql code contained in following [sql files](./src/github/sql) to create the database structure:

- [repositories.sql](./src/github/sql/repositories.sql)
- [users.sql](./src/github/sql/users.sql)

### <img width="20px" src="./images/logos/gitlab-logo.svg"> GitLab Database

1. Create GitLab database

Create a database called "gitlab" using your database editor or the command line.

2. Initialize GitLab database structure

Run the sql code contained in following [sql file](src/gitlab/sql) to create the database structure:

- [projects.sql](./src/gitlab/sql/projects.sql)