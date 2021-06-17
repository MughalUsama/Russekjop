<?php 
require_once("../../db.php");
session_start();
$userdata = array();
if ((array_key_exists( "adminloggedin",$_SESSION)) and !isset($_REQUEST["bid"])) {
    $query = "Select * from business_info;";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while($row = $bresult->fetch_assoc())
        {
            array_push($userdata,mb_convert_encoding($row, "HTML-ENTITIES", "UTF-8"));
        }
    }
	print_r(json_encode($userdata));
	

}
else{
    $bid =mysqli_escape_string(db::getInstance(), $_REQUEST["bid"]);

    $query = "Select website, telephone, business_email, address, logo_name from business_info where business_id = \"$bid\";";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        $row = $bresult->fetch_assoc();
        
        array_push($userdata,mb_convert_encoding($row, "HTML-ENTITIES", "UTF-8"));
    }
    print_r(json_encode($userdata));
}


?>