# Database
Name: _login-system_

Tables:
- _users_
- _savedSessions_

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

### savedSessions
Contains saved sessions ('remember me' checkbox on login screen)
```
column          | description
----------------+---------------------------------------------------
id              | contains session id
userId          | contains user's id (users.id)
passHash        | contains hash of (users.password) for that user
```
