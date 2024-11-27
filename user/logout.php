<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<html>
<head>
<title>Logout</title>
</head>
<body>
	<h1>Logged out</h1>
</body>
