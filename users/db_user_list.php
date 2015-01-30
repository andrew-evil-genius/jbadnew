<?php
require_once "../db/db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$sql = "select id, 
			username, 
			concat_ws(', ', lname, fname) as full_name,
			fname as first_name,
			lname as last_name, 
			email, 
			admin 
		from users";
$result = $db->query($sql);

$list = array();

while ($item = $result->fetch_assoc()) {
	if ($item["admin"] == 0) {
		$item["admin"] = false;
	} else {
		$item["admin"] = true;
	}
	$list[] = $item;
}

echo json_encode($list);
?>
