<?php 
require_once "db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$sql = "select id, type from lead_type";

$result = $db->query($sql);

$list = array();

while ($item = $result->fetch_assoc()) {
	$list[] = $item;
}

echo json_encode($list);

?>