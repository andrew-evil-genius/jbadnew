<?php
require_once "db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$sql = "select l.id, l.name as company_name, l.contact_name, s.amount, lp.phone, ls.status 
        from leads as l 
        inner join lead_status as ls on l.status_id = ls.id 
        left join lead_phone as lp on l.id = lp.lead_id
        left join sales as s on s.lead_id = l.id 
        where l.campaign_id = ".$_SESSION["curr_campaign_id"];
$result = $db->query($sql);

$list = array();

while ($item = $result->fetch_assoc()) {
	$list[] = $item;
}

echo json_encode($list);
?>