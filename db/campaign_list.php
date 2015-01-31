<?php

require_once "db.php";

session_start();
if (!$db) {
    $_SESSION["flash"] = "Failed to connect to the database.";
    header("Location: ../index.php");
    exit;
}

$sql = "select c.id, c.name, c.status, c.dare, sum(s.amount) as total_sales
	from campaigns as c
	left join leads as l on c.id = l.campaign_id
        left join sales as s on s.lead_id = l.id
	group by c.id";

$result = $db->query($sql);

$response = array();
if ($result) {
    $response["success"] = true;
    $response["msg"] = "Campaigns returned.";
    $response["campaigns"] = array();
    while ($item = $result->fetch_assoc()) {
	$response["campaigns"][] = $item;
    }
} else {
    $response["success"] = false;
    $response["msg"] = "Failed to return any campaigns.";
}

echo json_encode($response);