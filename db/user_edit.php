<?php
require_once "db.php";
require_once "../common/functions.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$id = filter_input(INPUT_GET, "id");
$username = filter_input(INPUT_GET, "username");
$fname = filter_input(INPUT_GET, "first_name");
$lname = filter_input(INPUT_GET, "last_name");
$email = filter_input(INPUT_GET, "email");
$admin = filter_input(INPUT_GET, "admin") == "true" ? 1 : 0;

$password_sql = "";
$editPassword = array_key_exists("password", $_GET);

if ($editPassword) {
	$editPassword = (filter_input(INPUT_GET, "password") == "" ? false : true);
}

if ($editPassword) {
	$password = md5(filter_input(INPUT_GET, "password"));
	$password_sql = "password = '$password', ";
}

$sql = "update users set 
			username = '$username', 
			$password_sql
			fname = '$fname', 
			lname = '$lname', 
			email = '$email', 
			admin = $admin 
		where id = $id";
$result = $db->query($sql);

if ($result) {
	$msg = "User updated.";
} else {
	$msg = $db->error;
}
$response = array("succes" => $result, "msg" => $msg);

echo json_encode($response);
?>