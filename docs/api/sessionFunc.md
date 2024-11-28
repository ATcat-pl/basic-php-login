# sessionFunc
[source](../../api/sessionFunc.php)
This file contains functions for managing sessions.

Functions:
- [checkSessionCookie()](#checksessioncookie):bool
- [createSession(<span>$</span>userId, <span>$</span>username)](#createsessionuserid-username):void
- [deleteSession()](#deletesession):void
- [saveSession(<span>$</span>userId, <span>$</span>password)](#savesessionuserid-password):bool
- [deleteSavedSession(<span>$</span>sessionId)](#deletesavedsessionsessionid):bool
- [discardSessions(<span>$</span>userId)](#discardSessionuserId):bool

## checkSessionCookie()
Checks session cookie and logs user in.

Type: bool
Returns `true` on success or `false` on fail
## createSession(<span>$</span>userId, <span>$</span>username)
Creates session for user.

Type: void
## deleteSession()
Deletes user's session (logs out from session).

Type: void
## deleteSavedSession(<span>$</span>sessionId)
Deletes session cookie.

Type: bool
Returns `true` on success or `false` on fail
## saveSession(<span>$</span>userId, <span>$</span>password)
Creates and saves session cookie for user.
$password is directly returned from database users->password.

Type: bool
Returns `true` on success or `false` on fail
## discardSessions(<span>$</span>userId)
Deletes all session for user with specified id.

Type: bool
Returns `true` on success or `false` on fail