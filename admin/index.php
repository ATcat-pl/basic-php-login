<!-- This a page that requires user to be logged in and be an administrator -->
<!--
Copyright Antoni Tyczka 2024
-->
<html>
<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$conn = require("api/database-conn.php");
	$stmt = $conn->prepare("SELECT isAdmin FROM users WHERE id=?");
	$stmt->bind_param("i",$_SESSION["id"]);
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();
	if($result->num_rows>0){
		$row=$result->fetch_row();
		if($row[0]==1){
			//is administrator
			?>
			<head>
				<title></title>
			</head>
			<body>
				<h1>Welcome <?php echo $_SESSION["username"];?></h1>
			</body>
			<?php
		} else {
			http_response_code(401);
			?>
			<head>
				<title></title>
			</head>
			<body>
				<h1>ERROR: You need to be an administrator to access this page.</h1>
			</body>
			<?php
		}
	}
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
