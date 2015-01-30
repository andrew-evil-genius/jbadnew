<?php
require_once "db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$lead_id = filter_input(INPUT_GET, "lead_id");
$company_name = filter_input(INPUT_GET, "company_name");
$contact_name = filter_input(INPUT_GET, "contact_name");
$line_of_business = filter_input(INPUT_GET, "line_of_business");
$phone = filter_input(INPUT_GET, "phone");
$amount = filter_input(INPUT_GET, "amount");
$email = filter_input(INPUT_GET, "email");
$status = filter_input(INPUT_GET, "status");
$type = filter_input(INPUT_GET, "type");
$stage = filter_input(INPUT_GET, "stage");
$address_1 = filter_input(INPUT_GET, "address_1");
$address_2 = filter_input(INPUT_GET, "address_2");
$city = filter_input(INPUT_GET, "city");
$state = (filter_input(INPUT_GET, "state") == "" ? 43 : filter_input(INPUT_GET, "state"));
$zip = filter_input(INPUT_GET, "zip");

// Update main information.
$sql = "update leads 
		set name = '$company_name', 
			contact_name = '$contact_name', 
			line_of_business = '$line_of_business', 
			status_id = $status,
			type_id = $type,
			stage_id = $stage,
			amount = $amount
		where id = $lead_id";

$result = $db->query($sql);

$response = array();
if ($result) {
	$response["success"] = true;
	$response["msg"] = "Lead Updated.";
}

// Update Address information
if ($address_1 != "" || $address_2 != "" || $city != "" || $zip != "") {
	$sql = "select id from lead_address where lead_id = $lead_id";
	$result = $db->query($sql);

	if ($result && $result->num_rows > 0) {
		$sql = "update lead_address 
				set line_1 = '$address_1',
					line_2 = '$address_2',
					city = '$city',
					state_id = $state,
					zip = '$zip'
				where lead_id = $lead_id";
	} else {
		$sql = "insert into lead_address
				(lead_id, line_1, line_2, city, state_id, zip) 
				values ($lead_id, '$address_1', '$address_2', '$city', $state, '$zip')";
	}
	$result = $db->query($sql);

	if (!$result) {
		$result["success"] = false;
		$response["msg"] = "Failed to update address information.";
	}	
}

// Update Phone information.
if ($phone != "") {
	$sql = "select id from lead_phone where lead_id = $lead_id";
	$result = $db->query($sql);

	if ($result && $result->num_rows > 0) {
		$sql = "update lead_phone 
				set phone = '$phone'
				where lead_id = $lead_id";
	} else {
		$sql = "insert into lead_phone
				(lead_id, phone) 
				values ($lead_id, '$phone')";
	}
	$result = $db->query($sql);

	if (!$result) {
		$result["success"] = false;
		$response["msg"] = "Failed to update phone information.";
	}	
}

// Update Phone information.
if ($email != "") {
	$sql = "select id from lead_email where lead_id = $lead_id";
	$result = $db->query($sql);

	if ($result && $result->num_rows > 0) {
		$sql = "update lead_email 
				set email = '$email'
				where lead_id = $lead_id";
	} else {
		$sql = "insert into lead_email
				(lead_id, email) 
				values ($lead_id, '$email')";
	}
	$result = $db->query($sql);

	if (!$result) {
		$result["success"] = false;
		$response["msg"] = "Failed to update email information.";
	}	
}

echo json_encode($response);
?>