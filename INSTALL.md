# Installation

## Database
First, you will need to create databases to store the data.

### GitHub Database

1. Create GitHub database

Create a database called "github" using your database editor or the command line.

2. Initialize GitHub database structure

Run the sql code contained in following sql files to create the database structure:

In the directory "src/github/sql":
- repositories.sql
- users.sql

### GitLab Database

1. Create GitLab database

Create a database called "gitlab" using your database editor or the command line.

2. Initialize GitLab database structure

Run the sql code contained in following sql file to create the database structure:

- src/github/sql/projects.sql