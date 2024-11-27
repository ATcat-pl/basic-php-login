<!-- This a page that requires user to be logged in and be an administrator -->
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
		<title></title>
	</head>
	<body>
		<h1>Welcome <?php echo $_SESSION["username"]; ?></h1>
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