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
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
    <script src="./js/notify.min.js"></script>
    <link rel="stylesheet" href="./css/Styles.css">

  </head>
<body>
	<header>
		<?php
     ob_start();
     require_once("./db.php");
		 require_once("./header.php");

     //redirect if logged in
    if (array_key_exists('businessloggedin' ,$_SESSION)) {
      header("location: ./businesshome.php");
      exit;  
    }    
    if(array_key_exists('clubloggedin',$_SESSION)){
      
      header("Location: ./userhome.php"); /* Redirect browser */
       /* Make sure that code below does not get executed when we redirect. */
       exit;
    }
    if (array_key_exists('adminloggedin',$_SESSION)) {
      header("Location: ./admin.php"); /* Redirect browser */
      /* Make sure that code below does not get executed when we redirect. */
      exit;
    }

    //log in
    $errormsg = "";
    if (isset($_POST["login"])){
      $email = mysqli_escape_string(db::getInstance(), $_POST["email"]);
      $passwd = mysqli_escape_string(db::getInstance(), $_POST["passwd"]);
      $query="Select * from clubs where email = '$email' and password = '$passwd' ;";
      $data = db::getInstance()->get_result($query);
      
      if($data){
        $_SESSION["login_time_stamp"] = time(); // login time used for expiring session
        $_SESSION['userdata'] = mysqli_fetch_assoc($data) ;
        $_SESSION["username"] = $_SESSION['userdata']['club_name'];
        if($_SESSION['userdata']['isadmin']=='1'){ 
          $_SESSION['adminloggedin'] = "yes";
          header("location: ./admin.php");
        }
        else{
          $_SESSION['clubloggedin'] = "yes";
          header("Location: ./userhome.php"); /* Redirect browser */
        }
        /* Make sure that code below does not get executed when we redirect. */
        exit;
        }
      else
      { 
        $errormsg = "error";    
      }
    }
		 ?>
     <span id="errormsg" class="d-none <?php echo($errormsg)?>"></span>
	</header>
	<section class="sign-in-sec py-4" style="background-image:url('./img/Pictureb.png');padding-top: 1.5%;padding-bottom: 1.5%;">
		<div class="container">
			<div class="row mb-4">
				<div class="col-12 text-center">
					<h2 class="heading mb-4" style="font-family: 'Times New Roman', Times, serif;">
						<strong class="font-weight-medium">Logg inn</strong>
					</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-md-10 col-lg-8 col-xl-6">
					<form class="login-form text-center" action="<?php  echo $_SERVER['PHP_SELF'];?>" id="login-form" method="POST">
						<div class="form-group mb-4 mb-lg-6">
							<input type="text" class="form-control" name="email" id="userEmail" placeholder="Epost (Brukernavn)" required>
						</div>
						<div class="form-group mb-2 mb-lg-6">
							<input type="password" class="form-control" name="passwd" id="userPassword" placeholder="Passord" minlength="8" required>
						</div>
						<div class="pt-4 mb-3">
							<button type="submit" name="login" id="userLoginBtn" class="btn btn-lg py-1 btn-dark text-capitalize font-weight-bold">Logg inn</button>
						</div>
						<p><a href="#forgetpassmodal" data-toggle="modal" data-target="#forgetpassmodal" style="font-size: 65%;">Forgot Password?</a></p>
						<hr style="width: 70%;">
						<p style="font-size: 65%;">Har du ingen konto? </p>
						<a href="register_Group.php" name="userRegister" id="userRegister" class="btn btn-lg py-1 btn-light text-capitalize font-weight-bold mx-1 text-dark">Registrer</a>
					</form>
				</div>
			</div>
				</div>
	</section>
<!-- Modal -->
<div class="modal fade" id="forgetpassmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Glemt passord??</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="email" class="form-control col-12" id="useremail" placeholder="Skriv inn din epost-adresse" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lukk</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" id = "reset-btn" data-target="#resetpassmodal">Neste</button>
      </div>
    </div>
  </div>
</div>

<!-- Code Modal -->
<div class="modal fade" id="resetpassmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reset-kode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label class="col-12"><b><i> Sjekk din epost for reset-kode.</i></b></label>
      <input type="number" class="form-control col-12" id="resetcode" placeholder="Reset-kode" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lukk</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" id="nextpass-btn">Neste</button>
      </div>
    </div>
  </div>
</div>

<!-- New Password Modal -->
<div class="modal fade" id="newpassmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="password" class="form-control col-12" id="newpass" placeholder="New Password" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lukk</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="change-btn" data-toggle="modal">Change</button>
      </div>
    </div>
  </div>
</div>


<?php
require_once("./footer.php");
?>

<script src="./js/login.js"></script>
</body>
</html>
