<?php
require_once "db.php";

function get_lead_from_id ($id, $conn) {
	$sql = "select name from leads where id = $id";
	$result = $conn->query($sql);

	if ($result) {
		$lead = $result->fetch_assoc();
		return $lead["name"];
	} else {
		return "Lead";
	}
}
?>