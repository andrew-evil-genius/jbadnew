<?php
require_once "db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$response = array();
$lead_id = filter_input(INPUT_GET, "lead_id");

$sql = "select l.id, l.name as company_name, l.contact_name, lc.status_id, l.type_id, l.stage_id, l.line_of_business, s.amount,  
            la.id as address_id, la.line_1, la.line_2, la.city, la.state_id, la.zip, lp.phone, le.email, l.user_id  
        from leads as l 
        left join lead_address as la on l.id = la.lead_id
        left join lead_phone as lp on l.id = lp.lead_id
        left join lead_email as le on l.id = le.lead_id
        left join sales as s on s.lead_id = l.id and s.campaign_id = ".$_SESSION["curr_campaign_id"]
     ." left join leads_campaigns as lc on lc.lead_id = l.id
        where l.id = $lead_id 
            and lc.campaign_id = ".$_SESSION["curr_campaign_id"];
error_log($sql);

$result = $db->query($sql);

if ($result) {
	$response["success"] = true;
	$response["msg"] = "Lead retrieved.";
	$response["lead"] = $result->fetch_assoc();
} else {
	$response["success"] = false;
	$response["msg"] = "Lead not retrieved.";
}

echo json_encode($response);