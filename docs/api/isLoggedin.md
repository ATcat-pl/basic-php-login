# isLoggedin
[source](../../api/isLoggedin.php)
This file checks if user is logged in.
__This file is a function.__ Can be used using _require("isAdmin.php")_ or with http request.
## return table
```
+------------------------+-------------------------+
|        method          |                         |
+-----------+------------+        condition        |
| require() |    http    |                         |
+-----------+------------+-------------------------+
|     0     |    no      |  user isn't logged in   |
|     1     |    yes     |    user is logged in    |
+-----------+------------+-------------------------+
```