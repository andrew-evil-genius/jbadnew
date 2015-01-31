<?php
require_once "db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$sql = "select created, note from lead_notes where lead_id = ".filter_input(INPUT_GET, "lead_id");
$result = $db->query($sql);

$list = array();

while ($item = $result->fetch_assoc()) {
	$list[] = $item;
}

echo json_encode($list);
?>