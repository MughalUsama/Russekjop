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
    <link rel="stylesheet" href="styles.css">
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
							<span class="title">Register group</span>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form class="login-form text-center" method="POST" action="#">
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" class="form-control border border-danger" placeholder="Group Name" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" class="form-control border border-danger" placeholder="Contact Person" required>
								</div>
								<div class="position-relative">
									<div class="form-group mb-4 mb-lg-6">
										<input type="text" class="form-control border border-danger" placeholder="Telephone" required>
									</div>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="email" class="form-control border border-danger" placeholder="Email(Username)" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" class="form-control border border-danger" placeholder="Address" required>
								</div>
								<div class="d-flex flex-row form-group mb-4 mb-lg-6">
									<input type="text" class=" form-control border border-danger" placeholder="Post Code" style="width: 65%;"  required>
									<input type="text" class=" form-control border border-danger" placeholder="City" style="margin-left:2.95%"  required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password" class="form-control border border-danger" placeholder="Password" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password" class="form-control border border-danger" placeholder="Confirm Password" required>
								</div>
								<div class="form-check d-flex flex-row">
							    <input type="checkbox" class="form-check-input border border-danger" id="ageCheck">
							    <label class="form-check-label" for="exampleCheck1" style="font-size:50%">I confirm that I am over 18 years old</label>
							  </div>
								<div class="pt-4 mb-5">
									<button type="submit" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold">sign up</button>
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
