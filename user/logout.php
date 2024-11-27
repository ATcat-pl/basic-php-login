<?php
session_start();
$_SESSION = array();
session_destroy();
if(isset($_COOKIE["sessionId"])) {
	$conn = require("../api/database-conn.php");
	$stmt = $conn->prepare("DELETE FROM savedSessions WHERE id = ?");
	$stmt->bind_param("s", $_COOKIE["sessionId"]);
	$stmt->execute();
	$stmt->close();
}
?>
<html>
<head>
<title>Logout</title>
</head>
<body>
	<h1>Logged out</h1>
</body>
