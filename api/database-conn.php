<!-- This is a file that creates a database connection, used by all other files. -->
<!--
Copyright Antoni Tyczka 2024
-->
<?php
if(__FILE__ == $_SERVER["SCRIPT_FILENAME"]){
	//called directly
	http_response_code(405);
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head></head>
	<body>
		<h1>Request not allowed</h1>
		<p>Requesting this file is not allowed.</p>
	</body>
	</html>
	<?php
} else {
	//included by another file
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'loginSystem');
	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if ($conn->connect_error) {
	    die("Database connection error: " . $conn->connect_error);
	}
	return $conn;
}
?>
