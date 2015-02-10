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
        left join leads_campaigns as lc on lc.lead_id = l.id
        left join campaigns as c on lc.campaign_id = c.id 
        inner join lead_status as ls on l.status_id = ls.id 
        left join lead_phone as lp on l.id = lp.lead_id
        left join sales as s on s.lead_id = l.id 
        where c.id = ".$_SESSION["curr_campaign_id"]." "
        .getWhereClause($_SESSION["roles"]);

$result = $db->query($sql);

$list = array();

while ($item = $result->fetch_assoc()) {
	$list[] = $item;
}

echo json_encode($list);

function getWhereClause($roles) {
    if (strpos($roles, "sales") !== false) {
        return "and l.user_id = ".$_SESSION["user_id"]." ";
    }
    
    if (strpos($roles, "collections") !== false) {
        return "and s.amount > 0";
    }
}