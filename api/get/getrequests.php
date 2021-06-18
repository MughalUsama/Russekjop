<?php 
require_once("../../db.php");
session_start();
$reqdata = array();
$clubdata = array();
$productdata = array();
$additionaldata = array();
if (array_key_exists( "adminloggedin",$_SESSION)) {
    $query = "Select * from club_requests where accepted_by is NULL;";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while($row = $bresult->fetch_assoc())
        {
            if($row["table_name"]!=null)
            {
                $additionalQuery = "Select * from {$row["table_name"]} where request_id = {$row["request_id"]};";
                $additionalresult = db::getInstance()->get_result($additionalQuery);
                if($additionalresult){
                    array_push($additionaldata,$additionalresult->fetch_assoc());
                }
                else{
                    array_push($additionaldata,array());
                }
            }            
            else{
                array_push($additionaldata,array());
            }
            array_push($reqdata,$row);
            $query1 = "Select * from clubs where club_id = \"{$row["club_id"]}\";";
            $clubresult = db::getInstance()->get_result($query1);
            array_push($clubdata,$clubresult->fetch_assoc());
            $query2 = "Select * from products where product_id = \"{$row["product_id"]}\";";
            $productresult = db::getInstance()->get_result($query2);
            array_push($productdata,$productresult->fetch_assoc());
        }
    }
    $data = array(
        "req" => mb_convert_encoding($reqdata, "HTML-ENTITIES", "UTF-8"),
        "user" => mb_convert_encoding($clubdata, "HTML-ENTITIES", "UTF-8"),
        "product" => mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8"),
        "additionaldata" => mb_convert_encoding($additionaldata, "HTML-ENTITIES", "UTF-8")
    );
	print_r(json_encode($data));

}
elseif(array_key_exists("businessloggedin",$_SESSION))
{

    $query = "Select * from club_requests where  status =\"0\" and accepted_by is NULL and category_id in(Select category_id from business_categories where business_id = \"{$_SESSION["userdata"]["business_id"]}\") and product_id in(Select product_id from business_products where business_id = \"{$_SESSION["userdata"]["business_id"]}\");";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult){
        while($row = $bresult->fetch_assoc())
        {
            if($row["table_name"]!=null)
            {
                $additionalQuery = "Select * from {$row["table_name"]} where request_id = {$row["request_id"]};";
                $additionalresult = db::getInstance()->get_result($additionalQuery);
                if($additionalresult){
                    array_push($additionaldata,$additionalresult->fetch_assoc());
                }
                else{
                    array_push($additionaldata,array());
                }
            }
            else{
                array_push($additionaldata,array());
            }
            array_push($reqdata,$row);
            $query1 = "Select * from clubs where club_id = \"{$row["club_id"]}\";";
            $clubresult = db::getInstance()->get_result($query1);
            array_push($clubdata,$clubresult->fetch_assoc());
            $query2 = "Select * from products where product_id = \"{$row["product_id"]}\";";
            $productresult = db::getInstance()->get_result($query2);
            array_push($productdata,$productresult->fetch_assoc());
        }
        $data = array(
            "req" => mb_convert_encoding($reqdata, "HTML-ENTITIES", "UTF-8"),
            "user" => mb_convert_encoding($clubdata, "HTML-ENTITIES", "UTF-8"),
            "product" => mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8"),
            "additionaldata" => mb_convert_encoding($additionaldata, "HTML-ENTITIES", "UTF-8")
        );
        print_r(json_encode($data));        
    }
}
?>