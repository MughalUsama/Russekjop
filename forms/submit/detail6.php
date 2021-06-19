<?php

ob_start();
session_start();
if(!array_key_exists("clubloggedin", $_SESSION)){
    header("Location: ../../index.php"); /* Redirect browser */
    exit;
}

require_once("../../db.php");

if(isset($_REQUEST["send"])){
    $_SESSION["Start_Date"]= mysqli_escape_string(db::getInstance(), $_REQUEST["startDate"]);
    $_SESSION["price"]= mysqli_escape_string(db::getInstance(), $_REQUEST["price"]);
    $_SESSION["End_Date"]= mysqli_escape_string(db::getInstance(), $_REQUEST["endDate"]);
    $_SESSION["description"]= mysqli_escape_string(db::getInstance(), $_REQUEST["description"]);
    $_SESSION["tablename"]= mysqli_escape_string(db::getInstance(), $_REQUEST["tablename"]);
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
$query = "INSERT INTO `club_requests`(`club_id`, `category_id`, `product_id`, `quantity`, `description`, `filename`, `created_on`,`table_name`) VALUES (\"{$_SESSION["userdata"]["club_id"]}\",\"{$_SESSION["cat_id"]}\",\"{$_SESSION["pro_id"]}\",\"{$_SESSION["quantity"]}\",\"{$_SESSION["description"]}\",\"$newname\",\"$query_time\",\"{$_SESSION["tablename"]}\")";
db::getInstance()->dbquery($query);
$query = "Select * from `club_requests` where `club_id` = \"{$_SESSION["userdata"]["club_id"]}\" and  `created_on` = \"{$query_time}\";";
echo($query);

$result = db::getInstance()->get_result($query);
if($result)
{
    $row = mysqli_fetch_assoc($result);
    $query="INSERT INTO `detail6`(request_id,From_Date,To_Date,Price_For_Assignment) values (\"{$row["request_id"]}\",\"{$_SESSION["Start_Date"]}\",\"{$_SESSION["End_Date"]}\",\"{$_SESSION["price"]}\");";
    db::getInstance()->dbquery($query);
    echo($query);

//    header("Location: ../../userhome.php");
//    exit();  
}
else{
    echo("Something went wrong. Try again later.");
}
exit();
?>