<!-- This a page that requires user to be logged in -->
<!--
Copyright Antoni Tyczka 2024
-->
<html>
<?php
session_start();
if (require("../api/isLoggedin.php")) {
?>
<head>
	<title></title>
</head>
<body>
<h1>Welcome <?php echo $_SESSION["username"];?></h1>
<a href="logout.php">Logout</a>
</body>
<?php
} else {
?>
<head>
	<title></title>
</head>
<body>
	<h1>ERROR: You need to be logged in to access this page.</h1>
</body>
<?php
}
?>
</html>
