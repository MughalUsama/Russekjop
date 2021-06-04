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
		 require_once("./header.php")
		 ?>
	</header>
	<section class="sign-in-sec py-5 bg-white" style="background-color:red;padding-top: 1.5%;padding-bottom: 1.5%;">
				<div class="container">
					<div class="row mb-4">
						<div class="col-12 text-center">
							<h2 class="heading mb-4">
								<strong class="font-weight-medium">Login - Business</strong>
							</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form class="login-form text-center">
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="companyEmail" id="companyEmail" class="form-control" placeholder="Email (Username)" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password" name="companyPassword" id="companyPassword" class="form-control" placeholder="Password" minlength="8" required>
								</div>
								<div class="pt-4 mb-3">
									<button type="submit" name="companyLoginBtn" id="companyLoginBtn" class="btn btn-lg py-1 btn-dark text-capitalize font-weight-bold">Log in</button>
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
