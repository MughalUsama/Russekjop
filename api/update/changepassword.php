<?php 
session_start();
require_once("../../db.php");
$passwd = $_REQUEST["password"];
if ($_SESSION["changepass"] = "yes")
{
    $u_mail = mysqli_escape_string(db::getInstance(), $_SESSION["resetmail"]);
    $query = "Update clubs SET password = \"$passwd\" where email = \"{$u_mail}\";";
    if(db::getInstance()->dbquery($query))
    {
        echo("OK");
    }
    else
    {
        echo("Update failed");
    }
}
else{
    echo("Failed");
}

?>
