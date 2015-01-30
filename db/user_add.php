<?php
require_once "db.php";
require_once "../common/functions.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$username = filter_input(INPUT_GET, "username");
$password = md5(filter_input(INPUT_GET, "password"));
$fname = filter_input(INPUT_GET, "first_name");
$lname = filter_input(INPUT_GET, "last_name");
$email = filter_input(INPUT_GET, "email");
$admin = filter_input(INPUT_GET, "admin") == "true" ? 1 : 0;

$sql = "insert into users (username, password, fname, lname, email, admin) 
		values ('$username', '$password', '$fname', '$lname', '$email', $admin)";

$result = $db->query($sql);

if ($result) {
	$msg = "User added.";
} else {
	$msg = $db->error;
}
$response = array("succes" => $result, "msg" => $msg);

echo json_encode($response);
?>