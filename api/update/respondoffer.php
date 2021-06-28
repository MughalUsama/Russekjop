<?php 
require_once("../../db.php");
session_start();
$reqdata = array();

if(array_key_exists( "clubloggedin",$_SESSION))
{
    $date = date('Y-m-d H:i:s');
    if ($_REQUEST["mdata"]["btn"]=="accept") {
        $status = "1";
        $conn = db::getInstance();
        $data = $_REQUEST["mdata"];
        $rid = mysqli_escape_string($conn,$data["rid"]);
        $bid = mysqli_escape_string($conn,$data["bid"]);
        $query = "Update club_requests Set status = \"$status\", accepted_by = \"{$bid}\",accepted_on = \"$date\"  where request_id = \"$rid\";";
        $bresult = db::getInstance()->dbquery($query);
        $result = array();
        $query = "Update offer_messages Set status = \"$status\" where request_id = \"$rid\";";
        $bresult = db::getInstance()->dbquery($query);

        $query = "INSERT INTO `offer_messages`(`business_id`, `club_id`, `message`,`request_id`, `sentby`, `status`, `is_seen`) VALUES ('{$bid}','{$_SESSION["userdata"]["club_id"]}','Offer Accepted','{$rid}','0', '1' ,'0');";
        $msgresult = db::getInstance()->dbquery($query);
        
        if ($bresult) {
            $result = array(
                "msg" =>"done"
                );
        }
        else{
            $result = array(
                "msg" =>"failed"
                );
        }

}
    else{
        $status = "-1";
        $conn = db::getInstance();
        $data = $_REQUEST["mdata"];
        $rid = mysqli_escape_string($conn,$data["rid"]);
        $bid = mysqli_escape_string($conn,$data["bid"]);
        $result = array();
        $query = "Update club_requests Set status = \"$status\" where request_id = \"$rid\";";
        $bresult = db::getInstance()->dbquery($query);
        $result = array();
        $query = "Update offer_messages Set status = \"$status\" where request_id = \"$rid\";";
        $bresult = db::getInstance()->dbquery($query);
    
        if ($bresult) {
            $result = array(
                "msg" =>"done"
                );
        }
        else{
            $result = array(
                "msg" =>"failed"
                );
        }
    
    }
    
    echo($bresult);
}

?>