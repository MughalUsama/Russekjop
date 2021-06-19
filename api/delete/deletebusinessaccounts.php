<?php 
require_once("../../db.php");
session_start();
$userdata = array();
if (array_key_exists( "adminloggedin",$_SESSION)) {
    $query = "Delete from business_info where business_id = \"{$_REQUEST["bid"]}\";";
    $bresult = db::getInstance()->dbquery($query);
    if ($bresult) {
        $userdata[] = array(
            "deleted" => "yes"
        );
    }
    else{
        $userdata[] = array(
            "deleted" => "no"
        );
    }
	print_r(json_encode($userdata));
}

?>