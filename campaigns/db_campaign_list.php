<?php
$list = array();

$list[] = array("id" => 32, "campaign_name" => "A Brand New Campaign", "total_sales" => 0.00, "status" => "Active");
$list[] = array("id" => 31, "campaign_name" => "2015 Griffin Ga PD", "total_sales" => 3420.00, "status" => "Active");
$list[] = array("id" => 30, "campaign_name" => "2015 York Co", "total_sales" => 475.00, "status" => "Active");
$list[] = array("id" => 29, "campaign_name" => "2015 Hampton County", "total_sales" => 511.00, "status" => "Active");
$list[] = array("id" => 28, "campaign_name" => "2015 Liberty County", "total_sales" => 12458.00, "status" => "Inactive");
$list[] = array("id" => 27, "campaign_name" => "2015 Barnwell County", "total_sales" => 25365.00, "status" => "Inactive");
$list[] = array("id" => 26, "campaign_name" => "2015 Calhoun Co", "total_sales" => 4582.00, "status" => "Inactive");
$list[] = array("id" => 25, "campaign_name" => "2015 Chester County", "total_sales" => 125.00, "status" => "Inactive");
$list[] = array("id" => 24, "campaign_name" => "2015 Midland County", "total_sales" => 3541.00, "status" => "Active");
$list[] = array("id" => 23, "campaign_name" => "2015 Midland County", "total_sales" => 458.00, "status" => "Inactive");
$list[] = array("id" => 22, "campaign_name" => "2015 Gastonia, NC Explorers", "total_sales" => 985.00, "status" => "Inactive");
$list[] = array("id" => 21, "campaign_name" => "2015 Powder Springs Explorers", "total_sales" => 4592.00, "status" => "Inactive");
$list[] = array("id" => 20, "campaign_name" => "2015 Anderson Explorers", "total_sales" => 0.00, "status" => "Active");
$list[] = array("id" => 19, "campaign_name" => "2015 Richland Co", "total_sales" => 1256.00, "status" => "Inactive");
$list[] = array("id" => 18, "campaign_name" => "2015 Pickens, Sc Explorers", "total_sales" => 2453.00, "status" => "Inactive");
$list[] = array("id" => 17, "campaign_name" => "2015 Frankfort, KY P.D.", "total_sales" => 1253.00, "status" => "Inactive");
$list[] = array("id" => 16, "campaign_name" => "2015 Paducah Explorer", "total_sales" => 45.00, "status" => "Inactive");
$list[] = array("id" => 15, "campaign_name" => "2015 NCDOA BURLINGTON", "total_sales" => 3658.00, "status" => "Inactive");
$list[] = array("id" => 14, "campaign_name" => "2014 Burleson PD Explorer", "total_sales" => 0.00, "status" => "Inactive");
$list[] = array("id" => 13, "campaign_name" => "Nassau Co. FL", "total_sales" => 425.00, "status" => "Inactive");
$list[] = array("id" => 12, "campaign_name" => "2014 NCDOA Watauga", "total_sales" => 965.00, "status" => "Inactive");
$list[] = array("id" => 11, "campaign_name" => "2014 Reidsville NCPD", "total_sales" => 2632.00, "status" => "Inactive");
$list[] = array("id" => 10, "campaign_name" => "2014 NCDOA Monroe", "total_sales" => 125.00, "status" => "Inactive");
$list[] = array("id" => 9, "campaign_name" => "2014 NCDOA Waxhaw", "total_sales" => 0.00, "status" => "Inactive");
$list[] = array("id" => 8, "campaign_name" => "Liberty Co. TX", "total_sales" => 459.00, "status" => "Inactive");
$list[] = array("id" => 7, "campaign_name" => "2014 NCDOA Monroe", "total_sales" => 256.00, "status" => "Inactive");

echo json_encode($list);
?>