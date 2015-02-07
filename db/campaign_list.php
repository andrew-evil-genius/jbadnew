<?php

require_once "db.php";

session_start();
if (!$db) {
    $_SESSION["flash"] = "Failed to connect to the database.";
    header("Location: ../index.php");
    exit;
}

$sql = "select c.id, c.name, c.status, c.dare, c.startdate, c.enddate, l.user_id, sum(s.amount) as total_sales
	from campaigns as c
	left join leads as l on c.id = l.campaign_id
        left join sales as s on s.lead_id = l.id "
        .getWhereClause($_SESSION["roles"]).
	"group by c.id";

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

function getWhereClause($roles) {
    if (strpos($roles, "sales") !== false) {
        return "left join users as u on u.id = l.user_id where l.user_id = ".$_SESSION["user_id"]." ";
    }
}