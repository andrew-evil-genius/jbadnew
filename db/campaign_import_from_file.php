<?php
require_once "db.php";
require_once "../common/functions.php";

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
        throw new Exception("(Import Campaign From File) SQL_ERROR: $sql Error: ".$db->error);
    }
    $new_campaign_id = $db->insert_id;
    
    $exception = create_leads_from_file("uploads/campaign.csv", $db, $new_campaign_id);
    if ($exception) {
        throw $exception;
    }

    $db->commit();

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

function create_leads_from_file($file_name, $db, $new_campaign_id) {
    $file = fopen($file_name, "r");
    if (!$file) {
        return new Exception("(Import Campaign From File) FILE_IMPORT_ERROR: Unable to open file. ");
    }

    // Get the first row and do nothing with it.
    $data = fgetcsv($file, 1000, ",", '"');
    
    while ($data = fgetcsv($file, 1000, ",", '"')) {
        $sql = "insert into leads (name, contact_name, type_id, stage_id, line_of_business, user_id) 
                values ('".handleSpecialCharacters($data[COMPANY_NAME])."', '".handleSpecialCharacters($data[FIRST_NAME]).
                " ".handleSpecialCharacters($data[LAST_NAME])."', 1, 1, 'unknown', ".$_SESSION['user_id'].")";
        $result = $db->query($sql);
        if (!$result) {
            return new Exception("(Import Campaign From File) SQL_ERROR: $sql Error: ".$db->error);
        }

        $new_lead_id = $db->insert_id;

        $sql = "insert into leads_campaigns (lead_id, campaign_id, status_id) 
                values ($new_lead_id, $new_campaign_id, 1)";
        $result = $db->query($sql);
        if (!$result) {
            return new Exception("(Import Campaign From File) SQL_ERROR: $sql Error: ".$db->error);
        }

        $sql = "insert into lead_phone (lead_id, phone) values ($new_lead_id, '".$data[PHONE]."')";
        $result = $db->query($sql);
        if (!$result) {
            return new Exception("(Import Campaign From File) SQL_ERROR: $sql Error: ".$db->error);
        }

        $sql = "insert into lead_address (lead_id, line_1, city, state_id, zip) 
                values ($new_lead_id, '".$data[ADDRESS]."', '".$data[CITY]."', ".get_state_id($data[STATE], $db).", '".$data[ZIP]."')";
        $result = $db->query($sql);
        if (!$result) {
            return new Exception("(Import Campaign From File) SQL_ERROR: $sql Error: ".$db->error);
        }
    }
    fclose($file);
    return false;
}

function get_state_id($state, $db) {
    $sql = "select id from tbl_state where state_name = '$state' or state_abbr = '$state'";
    $result = $db->query($sql);
    if ($result) {
        $row_state = $result->fetch_assoc();
        return $row_state["id"];
    } else {
        return 43;
    }
}