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
    <!--JQUERY AND popper   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!--JQUERY AND bootstrap.js   -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/Styles.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
	<script src="./js/notify.min.js"></script>

  </head>
<body>
	<header>
		<?php
		 ob_start();
		 require_once("./db.php");
		 require_once("./header.php");
		$errormsg = "";
		if (isset($_POST["register"])){
			$email = $_POST["email"];
			$query="Select * from clubs where email = '$email';";
			$data = db::getInstance()->get_result($query);
			
			if(!$data)
			{

				$name = mysqli_escape_string(db::getInstance(),$_POST["clubname"]);
				$person = mysqli_escape_string(db::getInstance(),$_POST["contactperson"]);
				$telph = mysqli_escape_string(db::getInstance(),$_POST["telephone"]);
				$email = mysqli_escape_string(db::getInstance(),$_POST["email"]);
				$address = mysqli_escape_string(db::getInstance(),$_POST["address"]);
				$code = mysqli_escape_string(db::getInstance(),$_POST["postcode"]);
				$city = mysqli_escape_string(db::getInstance(),$_POST["city"]);
				$passwd = mysqli_escape_string(db::getInstance(),$_POST["password"]);
				
				$query="Insert into clubs(club_name, contact_person, telephone, email, address, post_code, city, password) VALUES ('$name','$person','$telph','$email','$address','$code','$city','$passwd');";
				if(db::getInstance()->dbquery($query))
				{
					$errormsg = "signedup";
					$query="Select * from clubs where email = '$email' and password = '$passwd' ;";
					$data = db::getInstance()->get_result($query);
					
					if($data){
					  $_SESSION["login_time_stamp"] = time(); // login time used for expiring session
					  $_SESSION['userdata'] = mysqli_fetch_assoc($data) ;
					  $_SESSION["username"] = $_SESSION['userdata']['club_name'];
					  $_SESSION['clubloggedin'] = "yes";
					  header("Location: ./userhome.php"); /* Redirect browser */
					  exit;
					}						  
				}
			}
			else
			{
				$errormsg = "error";    
			}
		}
	?>
	<span id="errormsg" class="d-none <?php echo($errormsg)?>"></span>

	</header>
	<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
				<div class="container">
					<div class="row mb-6 mb-lg-10 mb-xl-14">
						<div class="col-12 text-center mb-4">
							<h2 class="heading mb-3" >
								<strong class="font-weight-medium">Velkommen til </strong>
								<strong class="text-danger">Russekjøp</strong>
							</h2>
							<span class="title">Register group</span>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form id="reg-form" class="login-form text-center" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="clubname" id="userName" class="form-control border border-danger" placeholder="Gruppe-navn" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="contactperson" id="userContactPerson" class="form-control border border-danger" placeholder="Kontaktperson" required>
								</div>
								<div class="position-relative">
									<div class="form-group mb-4 mb-lg-6">
										<input type="text" name="telephone" id="userTelephone" class="form-control border border-danger" placeholder="Telefon" required>
									</div>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="email" name="email" id="userEmail" class="form-control border border-danger" placeholder="Epost (Brukernavn)" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="address" id="userAddress" class="form-control border border-danger" placeholder="Adresse" required>
								</div>
								<div class="d-flex flex-row form-group mb-4 mb-lg-6">
									<input type="text" name="postcode" id="userPostCode" class=" form-control border border-danger" placeholder="Postkode" style="width: 65%;"  required>
									<input type="text" name="city" id="userCity" class=" form-control border border-danger" placeholder="Sted" style="margin-left:2.95%"  required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password" name="password" id="password" class="form-control border border-danger" placeholder="Passord" minlength="8" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password"  id="confirmpassword" class="form-control border border-danger" placeholder="Bekfreft passord" minlength="8" required>
								</div>
								<div class="form-check d-flex flex-row">
							    <input type="checkbox" name="userAgeConfirmation" id="userAgeConfirmation" class="form-check-input border border-danger" required>
							    <label class="form-check-label" for="exampleCheck1" style="font-size:50%;">Jeg bekrefter at jeg er over 18 år *</label>
							  </div>
								<div class="pt-4 mb-5">
									<button type="submit" name="register" id="userSignUpBtn" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold">Registrer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>


<?php
require_once("./footer.php");
?>
<script src="./js/register_group.js"></script>
</body>
</html>
