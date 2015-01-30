<?php
require_once "db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$lead_id = filter_input(INPUT_GET, "lead_id");
$note = str_replace("'", "\'", filter_input(INPUT_GET, "note"));

$sql = "insert into lead_notes (lead_id, note) values ($lead_id, '$note')";

$result = $db->query($sql);

if ($result) {
	$msg = "Note added.";
} else {
	$msg = "Failure adding note to database.";
}

$response = array("succes" => $result, "msg" => $msg);

echo json_encode($response);
?>