<?php 
require_once("../../db.php");
session_start();
$reqdata = array();
$clubdata = array();
$productdata = array();
$msgdata = array();
$businessdata = array();
if (array_key_exists( "adminloggedin",$_SESSION)) {
    $query = "Select * from club_requests where accepted_by is NULL;";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while($row = $bresult->fetch_assoc())
        {
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
        "product" => mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8")
    );
	print_r(json_encode($data));

}
elseif(array_key_exists( "businessloggedin",$_SESSION))
{
    $conn = db::getInstance();
    $data = $_REQUEST["mdata"];
    $cid = mysqli_escape_string($conn,$data["cid"]); 
    $rid = mysqli_escape_string($conn,$data["rid"]);
    $bid = $_SESSION["userdata"]["business_id"]; 
    $query = "Select * from offer_messages where status= \"0\" and club_id = \"$cid\" and business_id = \"$bid\" and request_id = \"$rid\" ORDER BY datetime;";
    
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while($row = $bresult->fetch_assoc())
        {   
            array_push($msgdata,$row);
            $query1 = "Select * from clubs where club_id = \"$cid\"";
            $cresult = db::getInstance()->get_result($query1);
            if ($cresult) {
                $row1 = $cresult->fetch_assoc();
                array_push($clubdata,$row1);
            }
        }
    }
    $result = array(
        "msg" => mb_convert_encoding($msgdata, "HTML-ENTITIES", "UTF-8"),
        "club" => mb_convert_encoding($clubdata, "HTML-ENTITIES", "UTF-8")
    );
    echo(json_encode($result));
}
elseif(array_key_exists( "clubloggedin",$_SESSION))
{

    $creq = array();
    $givendata = $_REQUEST["mdata"];
    if($givendata["required"]=="1")
    {
        $cid = $_SESSION["userdata"]["club_id"]; 

        $query = "Select distinct business_id, request_id from offer_messages where status= \"0\" and club_id = \"$cid\" ORDER BY datetime;";
        $bresult = db::getInstance()->get_result($query);
        if ($bresult) {
            while($row = $bresult->fetch_assoc())
            {
                array_push($creq, mb_convert_encoding($row, "HTML-ENTITIES", "UTF-8"));
            }

        }
        else{
            $bid = $_SESSION["userdata"]["club_id"]; 

        }
        
    echo(json_encode($creq));

    }
    else{
        $conn = db::getInstance();
        $data = $_REQUEST["mdata"];
        $bid = mysqli_escape_string($conn,$data["bid"]); 
        $rid = mysqli_escape_string($conn,$data["rid"]);
        $cid = $_SESSION["userdata"]["club_id"]; 
    
        $query = "Select * from offer_messages where status= \"0\" and club_id = \"$cid\" and business_id = \"$bid\" and request_id = \"$rid\" ORDER BY datetime;";
        $bresult = db::getInstance()->get_result($query);
        if ($bresult) {
            while($row = $bresult->fetch_assoc())
            {
                array_push($msgdata,$row);
                $query1 = "Select * from business_info where business_id = \"$bid\"";
                $cresult = db::getInstance()->get_result($query1);
                if ($cresult) {
                    $row1 = $cresult->fetch_assoc();
                    array_push($businessdata,$row1);
    
                }
                $query2 = "Select * from club_requests where  status= \"0\" and request_id = \"$rid\";";
                $reqresult = db::getInstance()->get_result($query2);

                if ($reqresult) {
                    $row2 = $reqresult->fetch_assoc();
                    $query3 = "Select * from products where product_id = \"{$row2["product_id"]}\";";
                    $proresult = db::getInstance()->get_result($query3);
                    if ($reqresult) {
                        $row3 = $proresult->fetch_assoc();
                        array_push($productdata,$row3);
                }

            }
        }
            $result = array(
                "msg" =>  mb_convert_encoding($msgdata, "HTML-ENTITIES", "UTF-8"),
                "business" => mb_convert_encoding($businessdata, "HTML-ENTITIES", "UTF-8"),
                "products" =>  mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8")
            );
        }

        echo(json_encode($result));
    
    }

}
?>