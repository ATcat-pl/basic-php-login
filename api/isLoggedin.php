<!-- This is a file that check if user is logged in, used by all other files.
Returns:
+------------------------+-------------------------+
|        method          |                         |
+-----------+------------+        condition        |
| require() |    http    |                         |
+-----------+------------+-------------------------+
|     0     |    no      |  user isn't logged in   |
|     1     |    yes     |    user is logged in    |
+-----------+------------+-------------------------+

Copyright Antoni Tyczka 2024
-->
<?php
function loggedIn()
{
    session_start();
    $included = (__FILE__ != $_SERVER["SCRIPT_FILENAME"]);
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        if ($included) {
            return 1;
        } else {
            echo "yes";
        }
    } else {
        //no session
        require("sessionFunc.php");

        //check session cookie
        if (checkSessionCookie()) {
            if ($included) {
                return 1;
            } else {
                echo "yes";
            }
        } else {
            //no session, no session cookie
            if ($included) {
                return 0;
            } else {
                echo "no";
            }
        }
    }
}

return loggedIn();
?>