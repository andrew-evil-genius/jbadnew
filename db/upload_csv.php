<?php

session_start();

if (empty($_FILES)) {
    $response = array("success" => false, "msg" => "Problem loading file.");
    echo json_encode($response);
    exit;
}

/*// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

    $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

    if(!in_array(strtolower($extension), $allowed)){
        echo '{"status":"error"}';
        exit;
    }

    if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
        echo '{"status":"success"}';
        exit;
    }
}

echo '{"status":"error"}';
exit;*/


$ds = DIRECTORY_SEPARATOR; 
$store_folder = 'uploads'; 

// Upload the csv file.
$temp_file = $_FILES['file_upload']['tmp_name'];
$target_path = dirname( __FILE__ ) . $ds. $store_folder . $ds; 
$target_file =  $target_path."campaign.csv";
move_uploaded_file($temp_file, $target_file);