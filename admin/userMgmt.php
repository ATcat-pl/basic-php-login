<!-- This an user management panel page -->
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
		<title>User Management Panel</title>
	</head>
	<body>
        <h1>User Management Panel</h1>
		<h2>Welcome <?php echo $_SESSION["username"]; ?></h2>
        <p><a href="adduser.php">Create user</a></p>
		<label for="userlist">Users</label>
		<table id="userlist">
			<tr>
				<th>id</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
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