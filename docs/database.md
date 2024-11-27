# Database
Name: _loginSystem_

Tables:
- _users_

## Tables
### users
Contains users and basic information about them.
```
column          |     type     | description
----------------+--------------+----------------------------------------
id              |     int      | id
username        | varchar(64)  | username
password        | varchar(255) | hashed or plain text password
isPassHashed    |   boolean    | true if password column contains hashed password
email           | varchar(255) | email or null
isAdmin         |   boolean    | true if user is an administrator
```
### savedSessions
```
column          |     type     | description
----------------+--------------+----------------------------------------
id              |    char(13)  | session uid
userId          |     int      | user's id
passHash        | varchar(255) | hashed value from password column for that user
creationTime    |   timestamp  | creation timestamp
```