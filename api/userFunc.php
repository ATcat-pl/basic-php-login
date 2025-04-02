<!--
This file contains functions to manage users

Copyright Antoni Tyczka 2025
-->
<?php
function addUser($username, $password, $email){ //this function creates a user and returns it's id
	$conn = require("database-conn.php");
	if($conn->connect_error){
		die("ERROR: Could not connect to database".mysqli_connect_error());
	}
	if(empty(trim($username))){
		die("Username error");
	}
	if(empty($password){
		dir("Password cannot be empty");
	}
	$pass_hash = password_hash($password, PASSWORD_DEFAULT);
	$stmt = $conn->prepare("INSERT INTO users (username,password,email,isPassHashed) VALUES (?,?,?,1);");
	$stmt->bind_param("s",$username);
	$stmt->bind_param("s",$pass_hash);
	$stmt->bind_param("s",$email);
	$stmt->execute();
	$stmt->prepare("SELECT LAST_INSERT_ID();");
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();

	if($result->num_rows>0){
		$row = $result->fetch_row();
		return $row[0];
	} else {
		return NULL;
	}
}
?>
