<?php
require_once "../../db.php";
session_start();
$reqdata = array();
$clubdata = array();
$productdata = array();
$msgdata = array();
$businessdata = array();
$result = array();
if (array_key_exists("businessloggedin", $_SESSION)) {
    $creq = array();
    $givendata = $_REQUEST["mdata"];
    $conn = db::getInstance();
    $data = $_REQUEST["mdata"];

    $rid = mysqli_escape_string($conn, $data["rid"]);
    $req = mysqli_escape_string($conn, $data["required"]);
    $bid = $_SESSION["userdata"]["business_id"];

    $cid = mysqli_escape_string($conn, $data["cid"]);
    $query = "Select * from offer_messages where status= \"1\" and business_id = \"$bid\" and request_id = \"$rid\";";

    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while ($row = $bresult->fetch_assoc()) {
            array_push($msgdata, $row);
            $query1 = "Select * from clubs where club_id = \"$cid\"";
            $cresult = db::getInstance()->get_result($query1);
            if ($cresult) {
                $row1 = $cresult->fetch_assoc();
                array_push($clubdata, $row1);

            }
        }
        $result = array(
            "msg" => mb_convert_encoding($msgdata, "HTML-ENTITIES", "UTF-8"),
            "club" => mb_convert_encoding($clubdata, "HTML-ENTITIES", "UTF-8"),
        );

        echo (json_encode($result));

    }

}
