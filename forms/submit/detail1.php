<?php

ob_start();
session_start();
if(!array_key_exists("clubloggedin", $_SESSION)){
    header("Location: ../../index.php"); /* Redirect browser */
    exit;
}
require_once("../../db.php");

if(isset($_REQUEST["send"])){
    $_SESSION["color"]= mysqli_escape_string(db::getInstance(), $_REQUEST["color"]);
    $_SESSION["size"]= mysqli_escape_string(db::getInstance(), $_REQUEST["size"]);
    $_SESSION["quantity"]= mysqli_escape_string(db::getInstance(), $_REQUEST["quantity"]);
    $_SESSION["description"]= mysqli_escape_string(db::getInstance(), $_REQUEST["description"]);
    if(isset($_REQUEST["Print"])){
    $_SESSION["Print"]= "Yes";
    }
    else{
    $_SESSION["Print"]= "No";
    }    
}
else{
    header("Location: ../../index.php"); /* Redirect browser */
    exit;
}
$target_dir = "../../requestuploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$newname = "";
$uploadOk = 1;
$info = pathinfo($_FILES['fileToUpload']['name']);
$ext = "";
if($info["basename"]!=null){
    $ext = $info['extension']; // get the extension of the file
}
$nameid = uniqid();
$newname = $nameid.".".$ext; 
$target = '../../requestuploads/'.$newname;
move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);
if(!$info["basename"]){
  $newname = null;    
}
$query_time = date("Y-m-d h:i:sa");
$query = "INSERT INTO `club_requests`(`club_id`, `category_id`, `product_id`, `quantity`, `color`, `size`, `description`, `table_name`, `filename`, `created_on`) VALUES (\"{$_SESSION["userdata"]["club_id"]}\",\"{$_SESSION["cat_id"]}\",\"{$_SESSION["pro_id"]}\",\"{$_SESSION["quantity"]}\",\"{$_SESSION["color"]}\",\"{$_SESSION["size"]}\",\"{$_SESSION["description"]}\",\"{$_REQUEST["tablename"]}\",\"$newname\",\"$query_time\")";
db::getInstance()->dbquery($query);
$query = "Select * from `club_requests` where `club_id` = \"{$_SESSION["userdata"]["club_id"]}\" and  `created_on` = \"{$query_time}\";";

$result = db::getInstance()->get_result($query);
if($result)
{
    $row = mysqli_fetch_assoc($result);
    $query="INSERT INTO detail1(request_id,Print) values (\"{$row["request_id"]}\",\"{$_SESSION["Print"]}\");";
    db::getInstance()->dbquery($query);
    header("Location: ../../userhome.php");
    exit();  
}
else{
    echo("Something went wrong. Try again later.");
}

?>