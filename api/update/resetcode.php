<?php 
session_start();

$code = $_REQUEST["code"];
if (($_SESSION["resetcode"]) == strval($code))
{
    $_SESSION["changepass"] = "yes";
    echo("OK");
}
else{
    echo("Failed");
}

?>
