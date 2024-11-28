<!-- This is a file that contains functions for checking sessions
Functions:
createUser($username, $password, $email, $isAdmin):bool

Copyright Antoni Tyczka 2024
-->
<?php
function createUser($username, $password, $email, $isAdmin) {
    //generate password hash
    $passHash = password_hash($password, PASSWORD_DEFAULT);

    $conn = require("database-conn.php");
    $stmt = $conn->prepare("INSERT INTO users (username,password,isPassHashed,email,isAdmin) VALUES (?,?,1,?,?)");
    $stmt->bind_param("sssi", $username, $passHash, $email, $isAdmin);
    if($stmt->execute()){
        $stmt->close();
        return true;
    }
    $stmt->close();
    return false;
}
?>