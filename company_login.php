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

		 if (array_key_exists('businessloggedin' ,$_SESSION)) {
			header("location: ./businesshome.php");
			exit;  
		} 
		 if(array_key_exists('loggedin',$_SESSION)){
			header("Location: ./userhome.php"); /* Redirect browser */
			/* Make sure that code below does not get executed when we redirect. */
			exit;
		}
		  if (array_key_exists('adminloggedin',$_SESSION)) {
			header("Location: ./admin.php"); /* Redirect browser */
			/* Make sure that code below does not get executed when we redirect. */
			exit;
		}
		$errormsg = "";
		if (isset($_REQUEST["login"]))
		{
			$email = mysqli_escape_string(db::getInstance(), $_REQUEST["email"]);
			$passwd = mysqli_escape_string(db::getInstance(), $_REQUEST["passwd"]);
			$query = "Select * from business_info where email = \"$email\" and password = \"$passwd\";";
			$data = db::getInstance()->get_result($query);
			if ($data)
			{
				$_SESSION['userdata'] = mysqli_fetch_assoc($data) ;
				$_SESSION['username'] = $_SESSION['userdata']['business_name'];
				$_SESSION['businessloggedin'] = "yes";
				header("location: ./businesshome.php");
				exit;        
			}
			else
			{
				$errormsg = "error1";
			}
		}
		
		 ?>
	</header>
	<span id="errormsg" class="d-none <?php echo($errormsg)?>"></span>

	<section class="sign-in-sec py-5 bg-white" style="background-color:red;padding-top: 1.5%;padding-bottom: 1.5%;">
				<div class="container">
					<div class="row mb-4">
						<div class="col-12 text-center">
							<h2 class="heading mb-4">
								<strong class="font-weight-medium">Logg inn - Bedrift</strong>
							</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form class="login-form text-center" method="POST">
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="email" id="companyEmail" class="form-control border border-warning" placeholder="Epost (Brukernavn)" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password" name="passwd" id="companyPassword" class="form-control border border-success" placeholder="Passord" minlength="8" required>
								</div>
								<div class="pt-4 mb-3">
									<button type="submit" name="login" id="companyLoginBtn" class="btn btn-lg py-1 btn-dark text-capitalize font-weight-bold">Logg inn</button>
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
