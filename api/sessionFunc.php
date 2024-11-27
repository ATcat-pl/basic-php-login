<!-- This is a file that contains functions for checking sessions
Functions:
checkSessionCookie():bool
createSession($userId, $username):void
deleteSession():void
saveSession($userId, $password):void
deleteSavedSession($sessionId):void

Copyright Antoni Tyczka 2024
-->
<?php
function checkSessionCookie()
{
    //check if cookie exists
    if (isset($_COOKIE["sessionId"])) {
        $conn = require("database-conn.php");

        //delete all expired sessions from database
        $conn->query("DELETE FROM savedSessions WHERE creationTime < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 30 DAY))"); //using query because we aren't using any parameters so there is no security risk

        //get session with specified id from database
        $stmt = $conn->prepare("SELECT userId, passHash FROM savedSessions WHERE id = ?");
        $stmt->bind_param("s", $_COOKIE["sessionId"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        //if session with specified id exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            //get user data
            $stmt = $conn->prepare("SELECT username, password FROM users WHERE id = ?");
            $stmt->bind_param("i", $row["userId"]);
            $stmt->execute();
            $result2 = $stmt->get_result();
            $stmt->close();

            //user exists
            if ($result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();

                //verify hash stored in session with user
                if (password_verify($row2["password"], $row["passHash"])) {
                    //create session
                    createSession($row["userId"], $row2["username"]);
                    //delete saved session and create new one
                    deleteSavedSession($_COOKIE["sessionId"]);
                    saveSession($row["userId"], $row2["password"]);
                    return true;
                } else {
                    //password in session does not match user's password
                    deleteSavedSession($_COOKIE["sessionId"]);
                }
            } else {
                //no users match this session id
                //session id invalid
                deleteSavedSession($_COOKIE["sessionId"]);
            }
        }

    }
    return false;
}

function createSession($userId, $username)
{
    //create session
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $userId;
    $_SESSION["username"] = $username;
}

function deleteSession()
{
    session_start();
    $_SESSION = array();
    session_destroy();
}

function saveSession($userId, $password)
{
    $conn = require("database-conn.php");

    //generate uid
    $sessionid = uniqid();

    //generate passhash
    $passHash = password_hash($password, PASSWORD_DEFAULT);

    //set cookie
    setcookie("sessionId", $sessionid, time() + (86400 * 30), "/");

    //save session in database
    $stmt = $conn->prepare("INSERT INTO savedSessions (id, userId, passHash) VALUES (?,?,?)");
    $stmt->bind_param("sis", $sessionid, $userId, $passHash);
    $stmt->execute();
    $stmt->close();
}

function deleteSavedSession($sessionId)
{
    //delete session cookie from browser
    unset($_COOKIE['sessionId']);
    setcookie('sessionId', '', -1, '/');

    //delete session from database
    $conn = require("database-conn.php");
    $stmt = $conn->prepare("DELETE FROM savedSessions WHERE id = ?");
    $stmt->bind_param("s", $sessionId);
    $stmt->execute();
    $stmt->close();
}

?>