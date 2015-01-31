<?php
require_once "db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$company_name = filter_input(INPUT_GET, "company_name");
$contact_name = filter_input(INPUT_GET, "contact_name");
$lob = filter_input(INPUT_GET, "line_of_business");
$address_1 = filter_input(INPUT_GET, "address_1");
$address_2 = filter_input(INPUT_GET, "address_2");
$city = filter_input(INPUT_GET, "city");
$state_id = filter_input(INPUT_GET, "state");
$zip = filter_input(INPUT_GET, "zip");
$status = filter_input(INPUT_GET, "status");
$type = filter_input(INPUT_GET, "type");
$stage = filter_input(INPUT_GET, "stage");
$campaign = filter_input(INPUT_GET, "campaign");

$sql = "insert into leads (name, contact_name, line_of_business, status_id, type_id, stage_id, campaign_id) 
        values ('$company_name', '$contact_name', '$lob', $status, $type, $stage, $campaign)";

$result = $db->query($sql);

if (!$result) {
    $response = array("succes" => $result, "msg" => $db->error);
    echo json_encode($response);
    exit;
}

$lead_id = $db->insert_id;

if (isset($address_1) && $address_1 != "") {
    $sql = "insert into lead_address (lead_id, line_1, line_2, city, state_id, zip) 
            values ($lead_id, '$address_1', '$address_2', '$city', $state_id, '$zip')"; 
    $result = $db->query($sql);

    if ($result) {
    	$msg = "Lead Added.";
    } else {
	$msg = $db->error;
    }
}

$response = array("succes" => $result, "msg" => $msg);

echo json_encode($response);