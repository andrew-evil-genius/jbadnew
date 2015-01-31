<?php 
require_once "../db/db.php";

session_start();

if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$password = filter_input(INPUT_POST, "password");

$sql = "select u.id, 
			u.username, 
			u.password, 
			concat_ws(' ', u.fname, u.lname) as user, 
			u.admin,
			u.campaign, 
			c.name 
		from users as u 
		inner join campaigns as c on u.campaign = c.id 
		where username = '".filter_input(INPUT_POST, "username")."'";

$result = $db->query($sql);

if ($result) {
	$user = $result->fetch_assoc();
	if (md5($password) == $user["password"]) {
		$_SESSION["username"] = filter_input(INPUT_POST, "username");
		$_SESSION["user"] = $user["user"];
		$_SESSION["admin"] = $user["admin"];
		$_SESSION["curr_campaign"] = $user["name"];
		$_SESSION["curr_campaign_id"] = $user["campaign"];
		$_SESSION["flash"] = "Logged in!";
	} else {
		$_SESSION["flash"] = "Username / Password inccorect.";
	}
	$result->close();
}
$db->close();
header("Location: ../index.php");
?>