<?php
require_once "db.php";

session_start();
if (!$db) {
    $_SESSION["flash"] = "Failed to connect to the database.";
    header("Location: ../index.php");
    exit;
}

$name = filter_input(INPUT_POST, "name");
$start_date = DateTime::createFromFormat("d/m/Y", filter_input(INPUT_POST, "start_date"));
$end_date = DateTime::createFromFormat("d/m/Y", filter_input(INPUT_POST, "end_date"));
$status = filter_input(INPUT_POST, "status");
$dare = filter_input(INPUT_POST, "dare");
$source_campaign = filter_input(INPUT_POST, "source_campaign");


$sql = "insert into campaigns (name, startdate, enddate, status, dare) 
	values ('$name', '".date_format($start_date, "Y-m-d")."', '"
        .date_format($end_date, "Y-m-d")."', $status, $dare)";

$result = $db->query($sql);
$destination_campaign = mysqli_insert_id($db);

$sql = "select lead_id from leads_campaigns where campaign_id = $source_campaign";
$source_leads = $db->query($sql);

while ($row = $source_leads->fetch_assoc()) {
	$sql = "insert into leads_campaigns (lead_id, campaign_id) 
			values (".$row["lead_id"].", $destination_campaign)";
	$insert = $db->query($sql);
}

if ($result) {
    $msg = "Campaign added.";
} else {
    $msg = $db->error;
}
$response = array("success" => true, "msg" => $msg);

echo json_encode($response);