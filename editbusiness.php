<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Russekjøp</title>
	<link rel="icon" href="./img/color-Russekjob-logo-ai.png"/>
    <!--bootstrap   -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='./chosen/chosen.css'>

    <!-- Font Awesome JS -->
    <!--JQUERY AND popper   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="./chosen/chosen.jquery.js"></script>


    <!--JQUERY AND bootstrap.js   -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/admin.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/editbusiness.css'>

  </head>
<body>
	<div class="wrapper">

    <!-- Sidebar -->
<!-- Bootstrap NavBar -->
<!-- Bootstrap row -->
<header>
			<?php
             ob_start();
             require_once("./db.php");
			 require_once("./header_user.php");
             if (!array_key_exists( "adminloggedin",$_SESSION)) {
                header("./index.php");
                exit;
               }
//----------------------------------------------

if (isset($_REQUEST["bid"])) {
    $bid = $_REQUEST["bid"];
    $_SESSION["edit_bid"] = $_REQUEST["bid"];    
}
$bid = $_SESSION["edit_bid"];

$bquery = "Select * from business_info where business_id = \"{$bid}\";";
$bpdata = (db::getInstance()->get_result($bquery));
if (!$bpdata) {
    header("Location: ./managebusiness.php");
}
$brow = mysqli_fetch_assoc($bpdata);
$bname = $brow["business_name"];
$bvat = $brow["vat"];
$baddress = $brow["address"];
$bphone = $brow["telephone"];
$bemail = $brow["business_email"];
$bwebsite = $brow["website"];
$bperson = $brow["contact_person"];
$bcemail = $brow["contact_email"];
$busermail = $brow["email"];
$bpass = $brow["password"];
$blogo = $brow["logo_name"];

$query = "Select * from category;";
$pdata = (db::getInstance()->get_result($query));
//===============================================
if (isset($_REQUEST["regsub-btn"]))
{
    $bname = mysqli_escape_string(db::getInstance(),$_REQUEST["bname"]);
    $bemail = mysqli_escape_string(db::getInstance(),$_REQUEST["bemail"]);
    $useremail = mysqli_escape_string(db::getInstance(),$_REQUEST["useremail"]);
    $vat = mysqli_escape_string(db::getInstance(),$_REQUEST["vat"]);
    $address = mysqli_escape_string(db::getInstance(),$_REQUEST["address"]);
    $phone = mysqli_escape_string(db::getInstance(),$_REQUEST["btelephone"]);
    $website = mysqli_escape_string(db::getInstance(),$_REQUEST["website"]);
    $bperson = mysqli_escape_string(db::getInstance(),$_REQUEST["bperson"]);
    $contactemail = mysqli_escape_string(db::getInstance(),$_REQUEST["contactemail"]);
    $password = mysqli_escape_string(db::getInstance(),$_REQUEST["password"]);
        if(array_key_exists("categories",$_REQUEST)){
        $categories = $_REQUEST["categories"];
    }
    if(array_key_exists("products",$_REQUEST)){
        $products = $_REQUEST["products"];

    }
    if(array_key_exists("counties",$_REQUEST)){
        $counties = $_REQUEST["counties"];
    }
    if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['size'] > 0){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        $newname = "";
        if($check !== false) {

            $uploadOk = 1;
            $info = pathinfo($_FILES['fileToUpload']['name']);
            $ext = $info['extension']; // get the extension of the file
            $nameid = uniqid();
            $newname = $nameid.".".$ext; 
            $target = 'uploads/'.$newname;
            move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        $updatequery = "UPDATE business_info SET business_name= \"$bname\",vat= \"$vat\",business_email= \"$bemail\",address= \"$address\",telephone=\"$phone\",website=\"$website\",contact_person=\"$bperson\",contact_email=\"$contactemail\",password=\"$password\", logo_name=\"$newname\" WHERE business_id = \"$bid\";";
    }
    else{
        $updatequery = "UPDATE business_info SET business_name= \"$bname\",vat= \"$vat\",business_email= \"$bemail\",address= \"$address\",telephone=\"$phone\",website=\"$website\",contact_person=\"$bperson\",contact_email=\"$contactemail\",password=\"$password\" WHERE business_id = \"$bid\";";
    }
    if (db::getInstance()->dbquery($updatequery)) {
        $updatequery = "Delete from business_categories where business_id = \"$bid\";";
        if (db::getInstance()->dbquery($updatequery)) {
            $updatequery = "Delete from business_products where business_id = \"$bid\";";
            if (db::getInstance()->dbquery($updatequery)) {
                if((array_key_exists("categories",$_REQUEST)) and !empty($categories)){
                    foreach ($categories as $category) {
                        $category = mysqli_escape_string(db::getInstance(),$category);
                        $insert_query = "INSERT INTO business_categories(business_id, category_id) VALUES (\"$bid\",\"$category\");";
                        db::getInstance()->dbquery($insert_query);
                    }
                }
                //add products
                if((array_key_exists("products",$_REQUEST)) and !empty($products))
                {                    
                    foreach ($products as $product) {
                        $cat_pro = explode(" ",trim($product));
                        $insert_query = "INSERT INTO business_products(business_id, product_id, category_id) VALUES (\"$bid\",\"$cat_pro[1]\",\"$cat_pro[0]\");";
                        db::getInstance()->dbquery($insert_query);
                    }
                } 
            }

            }
        }
    }
?>
</header>
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="./index.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Homepage</span>
                </div>
            </a>
            <!-- Submenu content -->
            <a href="./profile.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span>
                </div>
            </a>
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPTIONS</small>
            </li>
            <!-- /END Separator -->
            <a href="./about_us.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-calendar fa-fw mr-3"></span>
                    <span class="menu-collapsed">About Us</span>
                </div>
            </a>
            <a href="./logout.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-tasks fa-fw mr-3"></span>
                    <span class="menu-collapsed">Logout</span>
                </div>
            </a>
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->
            
            <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <!-- MAIN -->
    <div class="col pt-0 create-account-sec">
    <div class="container-fluid px-4" id="card-container">
<!--
    content --------
-->

<div class="row col-12 mb-6 mb-lg-10 mb-xl-14">
<p class="d-none" id="bus-id"><?php echo($bid)?></p>

            <div class="col-12 text-center mt-4 mb-4">
                <h2>
                    <span class="text-white">Edit Business</span>
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
              <div class="col-12 col-md-8">
                <form class="login-form text-center" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="reg-form" enctype="multipart/form-data">
                    <div class="form-group row d-flex col-12 justify-content-center">
                        <input type="text" class=" reginput-border form-control col-11 col-md-9" value="<?php echo($bname) ;?>" name="bname" id="bname" placeholder="Business Name" required>
                    </div>
                    <div class="form-group row d-flex col-12 justify-content-center">
                    <input type="text" class=" reginput-border form-control   col-11 col-md-9" value="<?php echo($bvat) ;?>" name="vat" id="vat" placeholder="VAT number" required>
                    </div>
                    <div class="form-group row d-flex col-12 justify-content-center">
                    <input type="text" class=" reginput-border form-control   col-11 col-md-9" value="<?php echo($baddress) ;?>" name="address" id="address" placeholder="Adresse" required>
                    </div>
                    <div class="form-group row d-flex col-12 justify-content-center">
                    <input type="tel" class=" reginput-border form-control   col-11 col-md-9" value="<?php echo($bphone) ;?>" name="btelephone" id="btelephone" placeholder="Telephone" required>
                    </div>

                    <div class="form-group row d-flex col-12 justify-content-center">
                    <input type="email" class=" reginput-border form-control   col-11 col-md-9" value="<?php echo($bemail) ;?>" name="bemail" id="bemail" placeholder="Email (business contact email)" required>
                    </div>
                    <div class="form-group row d-flex col-12 justify-content-center">
                    <input type="url" class=" reginput-border form-control   col-11 col-md-9" value="<?php echo($bwebsite) ;?>" name="website" id="website" placeholder="Website (http://www.website.com)" required>
                    </div>

                    <div class="form-group row d-flex col-12 justify-content-center">
                    <input type="text" class=" reginput-border form-control   col-11 col-md-9" value="<?php echo($bperson) ;?>" name="bperson" id="bperson" placeholder="Contact person" required>
                    </div>

                    <div class="form-group row d-flex col-12 justify-content-center">
                    <input type="email" class=" reginput-border form-control   col-11 col-md-9" value="<?php echo($bcemail) ;?>" name="contactemail" id="contactemail" placeholder="Email (contact person)" required>
                    </div>
                    <div class="form-group row d-flex col-12 justify-content-center">
                    <input type="email" class=" reginput-border form-control   col-11 col-md-9" value="<?php echo($busermail) ;?>" name="useremail" id="useremail" placeholder="Email (Username)" required>
                    </div>
                    
                    <div class="form-group row d-flex col-12 justify-content-center">
                    <input type="password" class=" reginput-border form-control    col-11 col-md-9" value="<?php echo($bpass) ;?>" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group row d-flex col-12  justify-content-center">
                        
                        <select data-placeholder="Choose Categories" name="categories[]" id="category" multiple class="chosen">
                        <option value="-1"></option>
                        <?php 
                            while($row = mysqli_fetch_assoc($pdata))
                            {
                                    echo("<option value = \"{$row['category_id']}\" >{$row['category_name']}</option>");                            
                            }
                            ?>
                    </select>

                    </div>
                    <div class="form-group row d-flex col-12 justify-content-center">
                        <select data-placeholder="Choose Products/Services" name="products[]" id= "prod"  multiple class="chosen">
                        <option value="-1"></option>
                        </select>

                    </div>
                    
                    <div class="form-group row d-flex col-12 justify-content-center">
                        
                        <select data-placeholder="Choose Counties" name="counties[]" id="county" multiple class="chosen">
                        <option value="-1"></option>
                            <option value="Hele Norge (all over the country)">Hele Norge (all over the country)</option>
                            <option value="Oslo">Oslo</option>
                            <option value="Rogaland">Rogaland</option>
                            <option value="Møre og Romsdal">Møre og Romsdal</option>
                            <option value="Nordland">Nordland</option>
                            <option value="Viken">Viken</option>
                            <option value="Innlandet">Innlandet</option>
                            <option value="Vestfold og Telemark">Vestfold og Telemark</option>
                            <option value="Agder">Agder</option>
                            <option value="Vestland">Vestland</option>
                            <option value="Trøndelag">Trøndelag</option>
                            <option value="Troms og Finnmark">Troms og Finnmark</option>
                        </select>

                    </div>
                    <div class="form-group row d-flex col-12 justify-content-center">
                        <input class="col-9 py-1 text-primary bg-white" type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="form-group row d-flex col-12 justify-content-end">
                    <button type="submit" id = "regsub-btn" name="regsub-btn" class="border border-white btn btn-lg py-1 btn-danger text-capitalize font-weight-bold">Update</button>
                    </div>

                </form>
            </div>
        </div>

<!--
    content end--------
-->
    </div><!-- Main Col END -->
    </div><!-- body-row END -->
    <!-- Page Content -->


			
		<?php
		require_once("./footer.php");
		?>

    <script src="./js/editbusiness.js"></script>
    <script src="./js/sidebar.js"></script>
</body>
</html>
