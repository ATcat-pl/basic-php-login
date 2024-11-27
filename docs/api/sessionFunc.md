# sessionFunc
[source](../../api/sessionFunc.php)
This file contains functions for managing sessions.

Functions:
- [checkSessionCookie()](#checkSessionCookie):bool
- [createSession($userId, $username)](#createSession--userId--$username):void
- [deleteSession()](#deleteSession):void
- [saveSession($userId, $password)](#saveSession--userId--$password):void
- [deleteSavedSession($sessionId)](#deleteSavedSession--sessionId):void

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