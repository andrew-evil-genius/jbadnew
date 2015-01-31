<?php
require_once "db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$sql = "select id, state_name, state_abbr 
		from tbl_state";
$result = $db->query($sql);

$list = array();

while ($item = $result->fetch_assoc()) {
	$list[] = $item;
}

echo json_encode($list);
?>