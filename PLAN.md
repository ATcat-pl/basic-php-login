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
3. adjust $_SESSION
    - based on
        - [stack overflow answer](https://stackoverflow.com/a/10165602)
        - [php docs](https://www.php.net/manual) - [Session Management Basics](https://www.php.net/manual/en/features.session.security.management.php)
