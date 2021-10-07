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
	<link rel='stylesheet' type='text/css' media='screen' href='./chosen/chosen.css'>

	<!--JQUERY AND popper   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!--JQUERY AND bootstrap.js   -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./vanillaSelectBox/vanillaSelectBox.css">
	<script src="./vanillaSelectBox/vanillaSelectBox.js"></script>
	<link rel="stylesheet" href="./css/Styles.css">
	<script src="./chosen/chosen.jquery.js"></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./css/business_registration.css'>
    <script src="./js/notify.min.js"></script>

	<link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
  </head>
<body>
	<header>
			
			
<?php
	ob_start();
	require_once("./db.php");
	require_once("./header_user.php");
	//redirect if not logged in
	if (!array_key_exists('adminloggedin',$_SESSION)) {
		header("Location: ./index.php"); /* Redirect browser */
		/* Make sure that code below does not get executed when we redirect. */
		exit;
	}
	//get category data
	$query = "Select * from category;";
	$cdata = (db::getInstance()->get_result($query));

	//insert into db
	if (isset($_REQUEST["regsub-btn"]))
	{
		$bname = mysqli_escape_string(db::getInstance(), $_REQUEST["bname"]);
		$vat = mysqli_escape_string(db::getInstance(), $_REQUEST["vat"]);
		$address = mysqli_escape_string(db::getInstance(), $_REQUEST["address"]);
		$phone = mysqli_escape_string(db::getInstance(), $_REQUEST["btelephone"]);
		$bemail = mysqli_escape_string(db::getInstance(), $_REQUEST["bemail"]);
		$website = mysqli_escape_string(db::getInstance(), $_REQUEST["website"]);
		$bperson = mysqli_escape_string(db::getInstance(), $_REQUEST["bperson"]);
		$contactemail = mysqli_escape_string(db::getInstance(), $_REQUEST["contactemail"]);
		$useremail = mysqli_escape_string(db::getInstance(), $_REQUEST["useremail"]);
		$password = mysqli_escape_string(db::getInstance(), $_REQUEST["password"]);
		$products = $_REQUEST["products"];
		if(array_key_exists("categories",$_REQUEST)){
			$categories = $_REQUEST["categories"];
		}
		if(array_key_exists("products",$_REQUEST)){
			$products = $_REQUEST["products"];
		}
		if(array_key_exists("counties",$_REQUEST)){
			$counties = $_REQUEST["counties"];
		}
		if(array_key_exists("subproducts",$_REQUEST)){
			$subproducts = $_REQUEST["subproducts"];
		}
		$hasSubprod = false;
		$bquery = "Select * from business_info where email = \"{$_REQUEST["useremail"]}\";";
		if(db::getInstance()->get_result($bquery)){
			$ac_er = "<p class =\"bg-danger px-1 text-white\">Email already in use.</p>" ;
		}
		else{
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
			}
			$insert_query = "INSERT INTO business_info(business_name, vat, address, telephone, business_email, website, contact_person, contact_email, email, password, logo_name) VALUES (\"$bname\",\"$vat\",\"$address\",\"$phone\",\"$bemail\",\"$website\",\"$bperson\",\"$contactemail\", \"$useremail\",\"$password\", \"$newname\");";
			if(db::getInstance()->dbquery($insert_query))
			{
				$bquery = "Select * from business_info where email = \"{$_REQUEST["useremail"]}\";";
				$result = db::getInstance()->get_result($bquery);
				$bid = $result->fetch_assoc()["business_id"];
				//add categories
				if((array_key_exists("categories",$_REQUEST)) and !empty($categories))
				{                    
					foreach ($categories as $category) {
						$category = mysqli_escape_string(db::getInstance(), $category);
						$insert_query = "INSERT INTO business_categories(business_id, category_id) VALUES (\"$bid\",\"$category\");";
						db::getInstance()->dbquery($insert_query);
					}
					//add products
					if((array_key_exists("products",$_REQUEST)) and !empty($products))
					{                    
						foreach ($products as $product) {
							$cat_pro = explode(" ",trim($product));
							if ($cat_pro[1]=="136") {
								$hasSubprod = true;
							}
							$insert_query = "INSERT INTO business_products(business_id, product_id, category_id) VALUES (\"$bid\",\"$cat_pro[1]\",\"$cat_pro[0]\");";
							db::getInstance()->dbquery($insert_query);
						}
					} 
				}
				if((array_key_exists("subproducts",$_REQUEST)) and !empty($subproducts) and $hasSubprod==true)
				{                    
					foreach ($subproducts as $sp) {
						$sp = mysqli_escape_string(db::getInstance(), $sp);
						$insert_query = "INSERT INTO business_subproducts(business_id, subproduct_id) VALUES (\"$bid\",\"$sp\");";
						db::getInstance()->dbquery($insert_query);
					}
				}
				
				//add counties
				if((array_key_exists("counties",$_REQUEST)) and !empty($counties))
				{                    
					foreach ($counties as $county) {
						$county = mysqli_escape_string(db::getInstance(), $county);
						$insert_query = "INSERT INTO business_counties(business_id, county_name) VALUES (\"$bid\",\"$county\");";
						db::getInstance()->dbquery($insert_query);
					}
				}
				$ac_er = "<p class = \"bg-success px-1 text-white\">Account added successfully</p>";
			}    
		}
	}
// ===== php ends	
?>


			<!-- html-->
	</header>
	<section class="create-account-sec py-8 py-md-10 py-lg-12">
				<div class="container">
					<div class="row mb-6 mb-lg-10 mb-xl-14">
						<div class="col-12 text-center mt-4 mb-4">
							<span class="title text-white">Bedrift Registration</span>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form class="login-form text-center" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="breg-form" enctype="multipart/form-data">
								<div class="form-group mb-3 mb-lg-6">
									<input type="text" name="bname" id="businessName" class="form-control border border-danger" placeholder="Bedriftsnavn" required>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<input type="text" name="vat" id="vat" class="form-control border border-danger" placeholder="Org.nr" required>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<input type="text" name="address" id="address" class="form-control border border-danger" placeholder="Adresse" required>
								</div>
								<div class="position-relative">
									<div class="form-group mb-3 mb-lg-6">
										<input type="text" name="btelephone" id="btelephone" class="form-control border border-danger" placeholder="Telefon" required>
									</div>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<input type="email" name="bemail" id="bemail" class="form-control border border-danger" placeholder="Kontaktepost" required>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<input type="text" name="website" id="website" class="form-control border border-danger" placeholder="Webside" required>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<input type="text" name="bperson" id="bperson" class="form-control border border-danger" placeholder="Kontaktperson" required>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<input type="email" name="contactemail" id="contactemail" class="form-control border border-danger" placeholder="Epost kontaktperson" required>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<input type="email" name="useremail" id="useremail" class="form-control border border-danger" placeholder="Epost (Brukernavn)" required>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<input type="password" name="password" id="password" class="form-control border border-danger" placeholder="Passord" required>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<select id="category" name="categories[]" multiple class="chosen" data-placeholder="Velg kategori">
									<?php 
										while($row = mysqli_fetch_assoc($cdata))
										{
											echo("<option value = \"{$row['category_id']}\">{$row['category_name']}</option>");                            
										}
									?>
									</select>
								</div>
								<div class="form-group mb-3 mb-lg-6">
									<select id="products" name="products[]"  multiple class="chosen" data-placeholder="Velg produkt">
									
									</select>
								</div>
								<div class="form-group mb-3 mb-lg-6" style="display: none;" id="subproducts-div">
								<select id="subproducts" name="subproducts[]"  multiple class="chosen" data-placeholder="Velg produkt">
									<option value="1">Toiletpaper</option>
									<option value="2">Paper towels</option>
									<option value="3">Socks</option>
									<option value="4">Lighter briquettes</option>
									<option value="5">Cleaning products</option>
									<option value="6">Cookies and Goodies</option>
									<option value="7">Greeting card/Christmas card</option>
									<option value="8">Cured meat & meat products</option>
								</select>
								</div>

								<div class="form-group mb-3 mb-lg-6">
								<select id="counties" name="counties[]"  multiple class="chosen" data-placeholder="Velg salgssteder">
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
								<div class="form-group d-flex mb-3 mb-lg-6 ">
									<div class="input-group-prepend d-none d-md-flex ">
										<label class="input-group-text d-md- border border-danger" for="fileToUpload">Upload logo image:</label>
									</div>
									<input class="form-control border border-danger" type="file" name="fileToUpload" id="fileToUpload" accept=".png,.jpg,.jpeg" required>
								</div>
								<div class="pt-2 mb-5">
									<button type="submit" name="regsub-btn" id="regsub-btn" class="border border-white btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-bottom: 8%;">Registrer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>


<?php
require_once("./footer.php");
?>
<script src="./js/business_registration.js"></script>
</body>
</html>
