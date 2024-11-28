# userMgmtFunc
[source](../../api/userMgmtFunc.php)
This file contains functions for managing users.
It's used by admin panel.

Functions:
- [userMgmtFunc](#usermgmtfunc):bool
  - [createUser($username, $password, $email, $isAdmin)](#createuserusername-password-email-isadmin)

## createUser($username, $password, $email, $isAdmin)
Creates user with specified parameters.
Hashes password before inserting it into the database.

Parameters:
- $username - string username
- $password - string plain text password
- $email - string email
- $isAdmin - int
  - 1 if user is administrator
  - 0 if user isn't an administrator
  
Type: bool
Return table
```
+-------+---------------------------+
| value |         condition         |
+-------+---------------------------+
| true  | user created successfully |
| false |   failed to create user   |
+-------+---------------------------+
```