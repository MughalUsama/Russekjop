<?php 
require_once("../../db.php");
session_start();
$userdata = null;
$carray = array();
$parray= array();
$countyarray = array();
if (array_key_exists( "adminloggedin",$_SESSION)) {
    $bid = $_REQUEST["bid"];
    $query = "Select * from business_categories where business_id = \"$bid\";";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while($row = $bresult->fetch_assoc())
        {
             array_push($carray,$row);
        }
    }
    $query = "Select * from business_products where business_id = \"$bid\";";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while($row = $bresult->fetch_assoc())
        {
             array_push($parray,$row);
        }
    }
    $query = "Select * from business_counties where business_id = \"$bid\";";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while($row = $bresult->fetch_assoc())
        {
             array_push($countyarray,$row);
        }
    }
    $userdata = array(
        "cat" => mb_convert_encoding($carray, "HTML-ENTITIES", "UTF-8"),
        "pro" => mb_convert_encoding($parray, "HTML-ENTITIES", "UTF-8"),
        "county" => mb_convert_encoding($countyarray, "HTML-ENTITIES", "UTF-8")
    );
    
print_r(json_encode($userdata));

}
?>