<!-- This an admin panel page -->
<!--
Copyright Antoni Tyczka 2024
-->
<html>
<?php
$isAdmin = require("../api/isAdmin.php");
if ($isAdmin == 1) {
	//is administrator
	?>
	<head>
		<title>Admin Panel</title>
	</head>
	<body>
        <h1>Admin Panel</h1>
		<h2>Welcome <?php echo $_SESSION["username"]; ?></h2>
        <p><a href="adduser.php">Create user</a></p>
	</body>
	<?php
} elseif ($isAdmin == 0) {
	http_response_code(401);
	?>
	<head>
		<title></title>
	</head>
	<body>
		<h1>ERROR: You need to be an administrator to access this page.</h1>
	</body>
	<?php
} else {
	http_response_code(401);
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