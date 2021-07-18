<?php
require_once "../../db.php";
session_start();
$reqdata = array();
$bNameData = array();
if (array_key_exists("clubloggedin", $_SESSION)) {

    $conn = db::getInstance();

    $cid = $_SESSION["userdata"]["club_id"];

    $query = "Select business_id, business_name from business_info;";

    $bresult = db::getInstance()->get_result($query);
    while ($row = $bresult->fetch_assoc()) {
        array_push($reqdata, $row);
    }
    $bNameData = array(
        "business" => mb_convert_encoding($reqdata, "HTML-ENTITIES", "UTF-8"),
    );
    echo (json_encode($bNameData));

}
