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
  </head>
<body>
	<header>
		<?php
		 ob_start();
		 require_once("./db.php");
		 require_once("./header.php");
if (isset($_POST["send"])){
			$name = mysqli_escape_string(db::getInstance(), $_POST["Name"]);
			$email = mysqli_escape_string(db::getInstance(), $_POST["Email"]);
			$telephone = mysqli_escape_string(db::getInstance(), $_POST["Telephone"]);
			$message = mysqli_escape_string(db::getInstance(), $_POST["message"]);
			$query="Insert into contact_us(Name, Email, Telephone, Message) VALUES ('$name','$email','$telephone','$message');";
			db::getInstance()->dbquery($query);
					 }	
		 ?>
		 
	</header>
	<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
				<div class="container">
					<div class="row mb-6 mb-lg-10 mb-xl-14">
						<div class="col-12 text-center mb-4">
							<h2 class="heading mb-3" >
								<strong class="font-weight-medium">Velkommen til </strong>
								<strong class="text-danger">Russekjøp</strong>
							</h2>
							<span class="title">Kontakt oss</span>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form class="login-form text-center" method="POST" action="#">
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="Name" id="Name" class="form-control border border-danger" placeholder="Navn" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="email" name="Email" id="Email" class="form-control border border-danger" placeholder="Epost" required>
								</div>
								<div class="position-relative">
									<div class="form-group mb-4 mb-lg-6">
										<input type="text" name="Telephone" id="Telephone" class="form-control border border-danger" placeholder="Telefon (optional)">
									</div>
								</div>
								<div class="form-group mb-1 mb-lg-6">
									<textarea name="message" id="paragraph_text" cols="50" rows="10" class="form-control border border-danger" placeholder="Din melding" required></textarea>
								</div>
								<div class="pt-4 mb-5">
									<button type="submit" name="send" id="userSignUpBtn" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-bottom: 8%;">Send</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>


<?php
require_once("./footer.php");
?>

</body>
</html>
