# Database
Name: _loginSystem_

Tables:
- _users_

## Tables
### users
Contains users and basic information about them.
```
column          | description
----------------+---------------------------------------------------
id              | id
username        | username
password        | hashed or plain text password
isPassHashed    | true if password column contains hashed password
email           | email or null
isAdmin         | true if user is an administrator
```
