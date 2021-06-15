<?php 
require_once("../../db.php");
session_start();
$conn = db::getInstance();

$userdata = array();
if (array_key_exists( "businessloggedin",$_SESSION)) {
    $givendata = $_REQUEST["req"];
    $rid = mysqli_escape_string($conn,$givendata["rid"]);
    $query = "UPDATE offer_messages SET is_seen=1 WHERE request_id = \"$rid\" and sentby = 0;";
    $bresult = db::getInstance()->dbquery($query);
    if ($bresult) {
        $userdata[] = array(
            "updated" => "yes"
        );
    }
    else{
        $userdata[] = array(
            "updated" => "no"
        );
    }
	print_r(json_encode($userdata));
}
elseif(array_key_exists( "clubloggedin",$_SESSION)){
    $givendata = $_REQUEST["req"];
    $rid = mysqli_escape_string($conn,$givendata["rid"]);
    $query = "UPDATE offer_messages SET is_seen=1 WHERE request_id = \"$rid\" and sentby = 1;";
    $bresult = db::getInstance()->dbquery($query);
    if ($bresult) {
        $userdata[] = array(
            "updated" => "yes"
        );
    }
    else{
        $userdata[] = array(
            "updated" => "no"
        );
    }
	print_r(json_encode($userdata));
}

?>