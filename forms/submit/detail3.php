<?php

ob_start();
session_start();
if(!array_key_exists("clubloggedin", $_SESSION)){
    header("Location: ../../index.php"); /* Redirect browser */
    exit;
}
require_once("../../db.php");

if(isset($_REQUEST["send"])){
    $_SESSION["numberOfPeople"]= mysqli_escape_string(db::getInstance(), $_REQUEST["numberOfPeople"]);
    $_SESSION["NumberOfProductsPerPerson"]= mysqli_escape_string(db::getInstance(), $_REQUEST["NumberOfProductsPerPerson"]);
    $_SESSION["NumberOfSalesRound"]= mysqli_escape_string(db::getInstance(), $_REQUEST["NumberOfSalesRoundity"]);
    $_SESSION["description"]= mysqli_escape_string(db::getInstance(), $_REQUEST["description"]);
    $_SESSION["tablename"]= mysqli_escape_string(db::getInstance(), $_REQUEST["tablename"]);
//checkboxes below    
    if($_REQUEST["spid"]=="1"){
    $_SESSION["checkToiletpaper"]= "Yes";
    }
    else{
    $_SESSION["checkToiletpaper"]= "No";
    }    
    if($_REQUEST["spid"]=="2"){
        $_SESSION["checkPaperTowels"]= "Yes";
    }
        else{
        $_SESSION["checkPaperTowels"]= "No";
    }
    if($_REQUEST["spid"]=="3"){
        $_SESSION["checkSocks"]= "Yes";
    }
        else{
        $_SESSION["checkSocks"]= "No";
    }
    if($_REQUEST["spid"]=="4"){
        $_SESSION["checkLighterBriquettes"]= "Yes";
    }
        else{
        $_SESSION["checkLighterBriquettes"]= "No";
    }    

    
    if($_REQUEST["spid"]=="5"){
        $_SESSION["checkCleaningProducts"]= "Yes";
    }
    else{
        $_SESSION["checkCleaningProducts"]= "No";
    }    
    if($_REQUEST["spid"]=="6"){
        $_SESSION["checkCookiesAndGoodies"]= "Yes";
    }
    else{
        $_SESSION["checkCookiesAndGoodies"]= "No";
    }
    if($_REQUEST["spid"]=="7"){
        $_SESSION["checkGreetingCardOrChristmasCard"]= "Yes";
    }
    else{
        $_SESSION["checkGreetingCardOrChristmasCard"]= "No";
    }
    if($_REQUEST["spid"]=="8"){
        $_SESSION["checkCuredMeatSndMeatProducts"]= "Yes";
    }
    else{
        $_SESSION["checkCuredMeatSndMeatProducts"]= "No";
    }    
    if($_REQUEST["spid"]=="9"){
        $_SESSION["checkOther"]= "Yes";
    }
    else{
        $_SESSION["checkOther"]= "No";
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
$query = "INSERT INTO `club_requests`(`club_id`, `category_id`, `product_id`, `description`, `table_name`, `filename`, `created_on`) VALUES (\"{$_SESSION["userdata"]["club_id"]}\",\"{$_SESSION["cat_id"]}\",\"{$_SESSION["pro_id"]}\",\"{$_SESSION["description"]}\",\"{$_REQUEST["tablename"]}\",\"$newname\",\"$query_time\")";
db::getInstance()->dbquery($query);
$query = "Select * from `club_requests` where `club_id` = \"{$_SESSION["userdata"]["club_id"]}\" and  `created_on` = \"{$query_time}\";";

$result = db::getInstance()->get_result($query);
if($result)
{
    $row = mysqli_fetch_assoc($result);
    $query="INSERT INTO `detail3`(`request_id`, `Number_of_People`, `Number_of_Products_per_Person`, `Number_of_Sales_Round`, `Toilet_Paper`, `Paper_Towels`, `Socks`, `Lighter_Briquettes`, `Cleaning_Products`, `Cookies_and_Goodies`, `Greeting_Card_Or_Christmas_Card`, `Cured_Meat_and_Meat_Products`, `Other`) VALUES(\"{$row["request_id"]}\",\"{$_SESSION["numberOfPeople"]}\",\"{$_SESSION["NumberOfProductsPerPerson"]}\",\"{$_SESSION["NumberOfSalesRound"]}\",\"{$_SESSION["checkToiletpaper"]}\",\"{$_SESSION["checkPaperTowels"]}\",\"{$_SESSION["checkSocks"]}\",\"{$_SESSION["checkLighterBriquettes"]}\",\"{$_SESSION["checkCleaningProducts"]}\",\"{$_SESSION["checkCookiesAndGoodies"]}\",\"{$_SESSION["checkGreetingCardOrChristmasCard"]}\",\"{$_SESSION["checkCuredMeatSndMeatProducts"]}\",\"{$_SESSION["checkOther"]}\");";
    db::getInstance()->dbquery($query);
    header("Location: ../../userhome.php");
    exit();  
}


require_once("../../db.php");


?>