<?php /*
This is a file that check if user is an administrator, used by all other files.

Returns:
+------------------------+----------------------------------------------+
|        method          |                                              |
+-----------+------------+                 condition                    |
| require() |    http    |                                              |
+-----------+------------+----------------------------------------------+
|    -1     | no-session |            user is not logged in             |
|     0     |    no      | user is logged in but isn't an administrator |
|     1     |    yes     |   user is logged in and is an adminstrator   |
+-----------+------------+----------------------------------------------+

Copyright Antoni Tyczka 2024
*/
function isAdmin()
{
    $loadedDirectly = strcmp(__FILE__, $_SERVER["SCRIPT_FILENAME"]);
    $loggedIn = require("isLoggedin.php");
    if ($loggedIn == 1) {
        $conn = require("database-conn.php");
        $stmt = $conn->prepare("SELECT isAdmin FROM users WHERE id=?");
        $stmt->bind_param("i", $_SESSION["id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            if ($row[0] == 1) {
                if ($loadedDirectly == 0) {
                    echo "yes";
                } else {
                    return 1;
                }
            } else {
                if ($loadedDirectly == 0) {
                    echo "no";
                } else {
                    return 0;
                }
            }
        }
    } else {
        if ($loadedDirectly == 0) {
            echo "no-session";
        } else {
            return -1;
        }
    }
}
return isAdmin();
?>