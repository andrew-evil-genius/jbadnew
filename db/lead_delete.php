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

$sql = "delete from leads where id = $id";

$result = $db->query($sql);

$sql = "delete from leads_campaigns where lead_id = $id";

$result = $db->query($sql);

if ($result) {
	$msg = "Lead deleted.";
} else {
	$msg = $db->error;
}
$response = array("succes" => $result, "msg" => $msg);

echo json_encode($response);
?>