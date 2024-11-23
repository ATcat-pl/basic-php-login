<!-- This login script and minimal page -->
<!--
Copyright Antoni Tyczka 2024
-->
<?php
session_start();
//check if user is already logged in, and redirect if yes
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: /user/");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
<html>
<head>
    <title>Sign in</title>
</head>
<body>
<main>
    <h1>Sign in</h1>
    <form method="post" action="login.php">
	<input type="text" name="uname" placeholder="user" required>
	<label for="floatingInput">Username or email</label>
	<input type="password" name="pass" placeholder="Password" required>
	<label for="floatingPassword">Password</label>
	<button type="submit">Sign in</button>
    </form>
<?php
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username_err = $password_err = $login_err = "";
	$username = $_POST["uname"];
	$password = $_POST["pass"];
	//check if username is set
	if (empty(trim($username)))
		$username_err = "Username or email not set.";
	else
		$username = trim($username);
	//check if password is set
	if (empty(trim($password)))
		$password_err = "Password not set.";
	else
		$password = trim($password);

	//check if username or email was entered
	$sqlwhere = "username";
	if (str_contains($username, '@')) {
		$sqlwhere = "email";
	}

	//both username and password are set
	if (empty($username_err) && empty($password_err)) {
		//connect to database
		$conn = require("database-conn.php");
		//prepare sql
		$stmt = $conn->prepare("SELECT id,username,isPassHashed,password FROM users WHERE $sqlwhere = ?;");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		//more than one row returned (username exists)
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$passok = false;
			if ($row["isPassHashed"]) {
				$passok = password_verify($password, $row["password"]);
			} else {
				$passok = strcmp($password, $row["password"]) == 0;
			}
			if ($passok) {
				session_start();
				$_SESSION["loggedin"] = true;
				$_SESSION["id"] = $row["id"];
				$_SESSION["username"] = $row["username"];
				header("location: /user/");

			} else {
				$login_err = "Invalid username or password.";
			}
		} else {
			$login_err = "Invalid username or password.";
		}
	}
	include("/var/www/api-internal/html/head.htm");
?>
	<title>Sign in</title>
<?php
	include("/var/www/api-internal/html/base-main.php");
?>
	<h1 class="display-4 font-weight-normal">Signing in</h1>
	<p class="lead font-weight-normal"><?php echo $login_err . "<br>" . $username_err . "<br>" . $password_err; ?></p>
	<button class="btn btn-danger rounded-pill px-3" onclick="location.href='/login.php'" type="button">Go back</button>
<?php
} if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
</main>
<footer></footer>
</body>
</html>
<?php } ?>