# userMgmtFunc
[source](../../api/userMgmtFunc.php)
This file contains functions for managing users.
It's used by admin panel.

Functions:
- [createUser($username, $password, $email, $isAdmin)](#createuserusername-password-email-isadmin):bool
- [deleteUser($userId)](#deleteuseruserid):bool
- [getUserIdByName($username)](#getuseridbynameusername):int
- [getUserIdByEmail($email)](#getuseridbyemail):int

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
Returns `true` on success or `false` on fail.
## deleteUser($userId):bool
Deletes user with specified id.
Warning also deletes all sessions for that user.

Type: bool
Returns `true` on success or `false` on fail.
## getUserIdByName($username)
Gets user id based on username.

Type: int
Returns user's id or `0` on error.
## getUserIdByEmail($email)
Gets user id based on email.

Type: int
Returns user's id or `0` on error.