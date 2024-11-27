<!-- This is a file that check if user is an administrator, used by all other files. -->
<!--
Copyright Antoni Tyczka 2024
-->
<?php
$included = (__FILE__ != $_SERVER["SCRIPT_FILENAME"]);
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$conn = require("database-conn.php");
	$stmt = $conn->prepare("SELECT isAdmin FROM users WHERE id=?");
	$stmt->bind_param("i",$_SESSION["id"]);
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();
	if($result->num_rows>0){
		$row=$result->fetch_row();
		if($row[0]==1){
            if($included){
                return 1;
            } else {
                echo "yes";
            }
        } else {
            if($included){
                return 0;
            } else {
                echo "no";
            }
        }
    }
} else {
    if($included){
        return -1;
    } else {
        http_response_code(422);
        echo "no-session";
    }
}
?>