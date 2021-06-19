<?php
session_start();
ob_start();
require_once("./db.php");

if (!array_key_exists( "adminloggedin",$_SESSION)) {
    # code...
    header("Location: ./index.php"); /* Redirect browser */
    /* Make sure that code below does not get executed when we redirect. */
    exit;
}
$res[] = array();
$deletenewsid = $_REQUEST["mdata"];

$deletenews = "Delete from news where news_id = \"$deletenewsid[news_id]\"";
    if(db::getInstance()->dbquery($deletenews))
    {
        $res[] = array(
            "deleted" => "yes"
        );
    }
    print_r(json_encode($res));
?>