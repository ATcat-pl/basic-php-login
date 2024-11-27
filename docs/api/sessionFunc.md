# sessionFunc
[source](../../api/sessionFunc.php)
This file contains functions for managing sessions.

Functions:
- [checkSessionCookie()](#checksessioncookie):bool
- [createSession($userId, $username)](#createsessionuserid-username):void
- [deleteSession()](#deletesession):void
- [saveSession($userId, $password)](#savesessionuserid-password):void
- [deleteSavedSession($sessionId)](#deletesavedsession-sessionid):void

## checkSessionCookie()
Checks session cookie and logs user in.

Type: bool
Return table
```
+-------+--------------------------+
| value |        condition         |
+-------+--------------------------+
| true  | user logged in correctly |
| false |  session cookie failed   |
+-------+--------------------------+
```
## createSession($userId, $username)
Creates session for user.

Type: void
## deleteSession()
Deletes user's session (logs out from session).

Type: void
## deleteSavedSession($sessionId)
Deletes session cookie.

Type: void
## saveSession($userId, $password)
Creates and saves session cookie for user.
$password is directly returned from database users->password.

Type: void