<?php

ob_start();
session_start();
if(!array_key_exists("clubloggedin", $_SESSION)){
    header("Location: ../../index.php"); /* Redirect browser */
    exit;
}

require_once("../../db.php");


?>