<?php
require_once "../../db.php";
session_start();
$reqdata = array();
$clubdata = array();
$productdata = array();
$msgdata = array();
$businessdata = array();

if (array_key_exists("clubloggedin", $_SESSION)) {
    $creq = array();
    $givendata = $_REQUEST["mdata"];
    $conn = db::getInstance();
    $data = $_REQUEST["mdata"];
    $bid = mysqli_escape_string($conn, $data["bid"]);
    $rid = mysqli_escape_string($conn, $data["rid"]);
    $cid = $_SESSION["userdata"]["club_id"];
    $query = "Select * from offer_messages where status= \"1\" and club_id = \"$cid\" and business_id = \"$bid\" and request_id = \"$rid\";";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while ($row = $bresult->fetch_assoc()) {
            array_push($msgdata, $row);
            $query1 = "Select * from business_info where business_id = \"$bid\"";
            $cresult = db::getInstance()->get_result($query1);
            if ($cresult) {
                $row1 = $cresult->fetch_assoc();
                array_push($businessdata, $row1);

            }
            $query2 = "Select * from club_requests where  status= \"0\" and request_id = \"$rid\";";
            $reqresult = db::getInstance()->get_result($query2);

            if ($reqresult) {
                $row2 = $reqresult->fetch_assoc();
                $query3 = "Select * from products where product_id = \"{$row2["product_id"]}\";";
                $proresult = db::getInstance()->get_result($query3);
                if ($reqresult) {
                    $row3 = $proresult->fetch_assoc();
                    array_push($productdata, $row3);
                }

            }
        }
        $result = array(
            "msg" => mb_convert_encoding($msgdata, "HTML-ENTITIES", "UTF-8"),
            "business" => mb_convert_encoding($businessdata, "HTML-ENTITIES", "UTF-8"),
            "products" => mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8"),
        );

        echo (json_encode($result));

    }

}
