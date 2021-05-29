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
		<nav id="header-nav" class="navbar navbar-default navbar-expand-sm bg-light" style="margin-bottom: 0px; height: 25%;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
	           <ul id="nav-list" class="nav navbar-nav navbar-right">
	            <li>
	              <a href="#" style="float: right;clear: left; position: relative;font-weight: bold;font-size: 1.7vw;color: black;">Comapny (Login)</a>
	            </li>
	          </ul>
	        </div >
					<div class="navbar-header col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="margin-left: 0%;">
						<a href="index.php" class="pull-left " style="float: left; clear: right;">
							<img src="Picture1.png" height="40%" width="40%">
							<br>
							<br>
						</a>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	           <ul id="nav-list" class="nav navbar-nav navbar-right">
	            <li>
	              <a href="#" style="float: right;clear: left; position: relative;font-weight: bold;font-size: 1.7vw;color: black;">Register Group<br></a>
	            </li>
	            <li>
	              <a href="#" style="float: right;clear: left; position: relative;font-weight: bold;font-size: 1.7vw;color: black;">Login
	              	<br></a>
	            </li>
	          </ul>
	        </div>
	      </div>  
			</div>
		</nav>
	</header>
	<section class="sign-in-sec py-8 py-md-10 py-lg-12" style="background-color:red;padding-top: 1.5%;padding-bottom: 1.5%;">
				<div class="container">
					<div class="row mb-4">
						<div class="col-12 text-center">
							<h2 class="heading mb-4 mb-xl-6">
								<strong class="font-weight-medium">Login</strong>
							</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form class="login-form text-center">
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" class="form-control" placeholder="Email (Username)">
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password" class="form-control" placeholder="Password">
								</div>
								<div class="pt-4 mb-3">
									<a href="connection.html" class="btn btn-lg py-1 btn-dark text-capitalize font-weight-bold">sign in</a>
								</div>
								<p><a href="#" style="font-size: 85%;">Forgot Password?</a></p>
								<hr style="width: 70%;">
								<p style="font-size: 85%;">Don't you have an account? <a href="register_Group.php" class="btn btn-lg py-1 btn-dark text-capitalize font-weight-bold mx-1">Register</a></p>
							</form>
						</div>
					</div>
				</div>
			</section>


<?php
require_once("./footer.php");
?>
<script src="./js/index.js"></script>

</body>
</html>