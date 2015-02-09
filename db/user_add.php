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
$roles = filter_input(INPUT_GET, "roles");

$sql = "insert into users (username, password, fname, lname, email, roles, campaign) 
		values ('$username', '$password', '$fname', '$lname', '$email', '$roles', ".$_SESSION["curr_campaign_id"].")";

$result = $db->query($sql);

if ($result) {
	$msg = "User added.";
} else {
	$msg = $db->error;
}
$response = array("succes" => $result, "msg" => $msg);

echo json_encode($response);