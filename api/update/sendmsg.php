<?php 
require_once("../../db.php");
session_start();
$reqdata = array();
$clubdata = array();
$productdata = array();

if (array_key_exists( "clubloggedin",$_SESSION)) {
    $conn = db::getInstance();
    $data = $_REQUEST["mdata"];
    $bid = mysqli_escape_string($conn,$data["bid"]); 
    $rid = mysqli_escape_string($conn,$data["rid"]);
    $cid = $_SESSION["userdata"]["club_id"]; 
    $msg = mysqli_escape_string($conn,$data["msg"]);
    $query = "Insert into offer_messages(business_id, club_id, message, request_id, sentby) values (\"$bid\",\"$cid\",\"$msg\",\"$rid\",\"0\");";
    db::getInstance()->dbquery($query);
}
elseif(array_key_exists( "businessloggedin",$_SESSION))
{
    $conn = db::getInstance();
    $data = $_REQUEST["mdata"];
    $cid = mysqli_escape_string($conn,$data["cid"]); 
    $rid = mysqli_escape_string($conn,$data["rid"]);
    $bid = $_SESSION["userdata"]["business_id"]; 
    $msg = mysqli_escape_string($conn,$data["msg"]);
    $query = "Update club_requests Set status = \"0\" where request_id = \"$rid\" and status!=\"1\"";
    db::getInstance()->dbquery($query);
    $query = "Update offer_messages Set status = \"0\" where request_id = \"$rid\" and status!=\"1\"";
    $squery = "Select * from club_requests where request_id = \"$rid\" and status!=\"1\"";
    $res = db::getInstance()->get_result($squery);
    if($res){
        $query = "Insert into offer_messages(business_id, club_id, message, request_id, sentby) values (\"$bid\",\"$cid\",\"$msg\",\"$rid\",\"1\");";
        db::getInstance()->dbquery($query);    
    }

}


?>