<?php 
  if(($_SESSION['adminloggedin']) != "yes"){
    header("Location: ./index.php"); /* Redirect browser */
    /* Make sure that code below does not get executed when we redirect. */
    exit;
  }
?>
<header>
		<?php
		 ob_start();
		 require_once("./db.php");
		 require_once("./header_user.php");
		$errormsg = "";
		if (isset($_POST["update"])){
			$email = $_REQUEST["email"];
			$query="Select * from clubs where email = '$email' and isadmin = '1';";
			$data = db::getInstance()->get_result($query);
			if($data)
			{

				$name = mysqli_escape_string(db::getInstance(),$_POST["clubname"]);
				$passwd = mysqli_escape_string(db::getInstance(),$_POST["password"]);
				
                $query="Update clubs Set club_name = \"$name\",  password = '$passwd' where email = '{$_SESSION["userdata"]["email"]}' and isadmin='1';";
                $regmsg = $query;
                if(db::getInstance()->dbquery($query))
                {
                    $regmsg = "d-flex";
                    $query1 = "Select * from clubs where email = '{$_SESSION["userdata"]["email"]}' and isadmin = '1';";
                    $udata = db::getInstance()->get_result($query1);
                    $_SESSION["userdata"] = mysqli_fetch_assoc($udata);
                    $errormsg = "updated";    
                }
			}
			else
			{
				$errormsg = "failed";    
			}
		}
	?>
	<span id="errormsg" class="d-none <?php echo($errormsg)?>"></span>

	</header>
	<section class="create-account-sec py-8 py-md-10 py-lg-12 pt-5">
				<div class="container">
					<div class="row mb-6 mb-lg-10 mb-xl-14">
						<div class="col-12 text-center mb-4">
							<h2 class="heading mb-3" >
								<strong class="font-weight-medium">Velkommen til </strong>
								<strong>Russekjøp</strong>
							</h2>
							<span class="title">Din Profil</span>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form id="reg-form" class="login-form text-center" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="clubname" id="userName" value="<?php echo($_SESSION['userdata']['club_name']); ?>" class="form-control border border-danger" placeholder="Gruppe-navn" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="email" name="email" id="userEmail" class="form-control border border-danger" value="<?php echo($_SESSION['userdata']['email']); ?>" placeholder="Epost (Brukernavn)" required readonly>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password" name="password" id="password" class="form-control border border-danger" value="<?php echo($_SESSION['userdata']['password']); ?>" placeholder="Passord" minlength="8" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password"  id="confirmpassword" class="form-control border border-danger" value="<?php echo($_SESSION['userdata']['password']); ?>" placeholder="Bekfreft passord" minlength="8" required>
								</div>
								<div class="pt-4 mb-5">
									<button type="submit" name="update" id="userSignUpBtn" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold">Oppdater</button>
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