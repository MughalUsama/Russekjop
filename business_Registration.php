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
	<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
				<div class="container">
					<div class="row mb-6 mb-lg-10 mb-xl-14">
						<div class="col-12 text-center mb-4">
							<h2 class="heading mb-3" >
								<strong class="font-weight-medium">Welcome to </strong>
								<strong class="text-danger">Russekjøp</strong>
							</h2>
							<span class="title">Business registration (done from admin page)</span>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form class="login-form text-center" method="POST" action="#">
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="businessName" id="businessName" class="form-control border border-danger" placeholder="Business Name" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="vatNumber" id="vatNumber" class="form-control border border-danger" placeholder="VAT Number" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="businessAddress" id="businessAddress" class="form-control border border-danger" placeholder="Address" required>
								</div>
								<div class="position-relative">
									<div class="form-group mb-4 mb-lg-6">
										<input type="text" name="businessTelephone" id="businessTelephone" class="form-control border border-danger" placeholder="Telephone" required>
									</div>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="email" name="businessEmail" id="businessEmail" class="form-control border border-danger" placeholder="Email 1(business contact email)" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="email" name="businessWebsite" id="businessWebsite" class="form-control border border-danger" placeholder="Website" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="contactPerson" id="contactPerson" class="form-control border border-danger" placeholder="Contact Person" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="email" name="contactPersonEmail" id="contactPersonEmail" class="form-control border border-danger" placeholder="Email Contact Person" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
								  <select type="text" name="Category" placeholder="Choose You Category" class="form-control border border-danger" id="Category">
								  	<option value="" selected disabled>Category</option>
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								  </select>
								</div>
								<div class="form-group mb-4 mb-lg-6">
								  <select type="text" name="Category" placeholder=" Choose You Category " class="form-control border border-danger" id="Product">
								  	<option value="" selected disabled>Product / Service</option>
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								  </select>
								</div>
								<div class="form-group mb-4 mb-lg-6">
								  <select type="text" name="Category" placeholder=" Choose You Category " class="form-control border border-danger" id="Product">
								  	<option value="" selected disabled>Places to Sell</option>
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								  </select>
								</div>
								<div class="pt-4 mb-5">
									<button type="submit" name="userSignUpBtn" id="userSignUpBtn" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-bottom: 8%;margin-top: 6%;">Register</button>
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
