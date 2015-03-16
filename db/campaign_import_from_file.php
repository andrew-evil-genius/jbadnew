<?php
require_once "db.php";

define("COMPANY_NAME", 2);
define("ADDRESS", 3);
define("CITY", 4);
define("STATE", 5);
define("ZIP", 6);
define("LAST_NAME", 11);
define("FIRST_NAME", 12);
define("TITLE", 14);
define("PHONE", 16);

session_start();
if (!$db) {
    $_SESSION["flash"] = "Failed to connect to the database.";
    header("Location: ../index.php");
    exit;
}

$resposne = array();

try {
    $db->autocommit(false);

    // Create the new campaign.
    $name = filter_input(INPUT_POST, "name");
    $start_date = DateTime::createFromFormat("d/m/Y", filter_input(INPUT_POST, "start_date"));
    $end_date = DateTime::createFromFormat("d/m/Y", filter_input(INPUT_POST, "end_date"));
    $status = filter_input(INPUT_POST, "status");
    $dare = filter_input(INPUT_POST, "dare");

    $sql = "insert into campaigns (name, startdate, enddate, status, dare) 
    	values ('$name', '".date_format($start_date, "Y-m-d")."', '"
            .date_format($end_date, "Y-m-d")."', $status, $dare)";

    $result = $db->query($sql);

    if (!$result) {
        throw new Exception("(Import Campaign From File) SQL_ERROR: $sql Error: ".$conn->error);
    }
    
    $db->commit();

    create_leads_from_file("uploads/campaign.csv", $db);

} catch (Exception $e) {
    $db->rollback();
    $response = array("success" => false, "msg" => $e->getMessage());
} finally {
    $db->autocommit(TRUE);
    unlink("uploads/campaign.csv");
}

if (!$response) {
    $response = array("success" => true, "msg" => "Campaign created successfully.");
}
echo json_encode($response);

function create_leads_from_file($file_name, $db) {
    $file = fopen($file_name, "r");
    if (!$file) {
        throw new Exception("(Import Campaign From File) FILE_IMPORT_ERROR: Unable to open file. ");
    }
    while ($data = fgetcsv($file, 1000, ",", '"')) {
        error_log(json_encode($data));
    }
    fclose($file);
}