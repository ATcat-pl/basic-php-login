<?php
/* 
This is a file that contains functions for checking sessions

Functions:
createUser($username, $password, $email, $isAdmin):bool
deleteUser($userId):bool
getUserIdByName($username):int
getUserIdByEmail($email):int
makeAdmin($userId):bool
makeNonAdmin($userId):bool

Copyright Antoni Tyczka 2024
*/

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

function deleteUser($userId) {
    $conn = require("database-conn.php");
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    if($stmt->execute()){
        $stmt->close();
        require_once("sessionFunc.php");
        discardSessions($userId);
        return true;
    }
    $stmt->close();
    return false;
}

function getUserIdByName($username) {
    $conn = require("database-conn.php");
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return intval($row["id"]);
    }
    return 0;
}

function getUserIdByEmail($email) {
    $conn = require("database-conn.php");
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return intval($row["id"]);
    }
    return 0;
}

function makeAdmin($userId) {
    $conn = require("database-conn.php");
    $stmt = $conn->prepare("UPDATE users SET isAdmin = 1 WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

function makeNonAdmin($userId){
    $conn = require("database-conn.php");
    $stmt = $conn->prepare("UPDATE users SET isAdmin = 0 WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}
?>