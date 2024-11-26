# Plan for next update
1. create table in database containg sessions
    - columns:
        - session id
        - user id
        - password hash
2. Add optional "remember me" option in login
    - base it on sessions (see 1.)
    - use cookies
        - save session id
