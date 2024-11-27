# isAdmin
[source](../../api/isAdmin.php)
This file checks if user is logged in as administrator
__This file is a function.__ Can be used using _require("isAdmin.php")_ or with http request.
## return table
```
+------------------------+----------------------------------------------+
|        method          |                                              |
+-----------+------------+                 condition                    |
| require() |    http    |                                              |
+-----------+------------+----------------------------------------------+
|    -1     | no-session |            user is not logged in             |
|     0     |    no      | user is logged in but isn't an administrator |
|     1     |    yes     |   user is logged in and is an adminstrator   |
+-----------+------------+----------------------------------------------+
```