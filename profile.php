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
	<link rel='stylesheet' type='text/css' media='screen' href='./chosen/chosen.css'>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/Styles.css">
	<script src="./chosen/chosen.jquery.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/business_registration.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
	<script src="./js/notify.min.js"></script>

  </head>
<body>
<?php
		if (array_key_exists('businessloggedin' ,$_SESSION)) {
			require_once("./business_profile.php");
		}    
		  if(array_key_exists('clubloggedin',$_SESSION)){
			require_once("./group_profile.php");  
		}
		  if (array_key_exists('adminloggedin',$_SESSION)) {
			require_once("./admin_profile.php");  
		}
		// else{
		// 	header("Location: ./index.php"); /* Redirect browser */
		// 	/* Make sure that code below does not get executed when we redirect. */
		// 	exit;
		// }
?>
</body>
</html>
