<?php
require_once "db.php";
require_once "../common/functions.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$sql = "select id, 
            username, 
            fname as first_name,
            lname as last_name, 
            email, 
            roles 
        from users";
$result = $db->query($sql);

$list = array();

while ($item = $result->fetch_assoc()) {
	$list[] = $item;
}

echo json_encode($list);
