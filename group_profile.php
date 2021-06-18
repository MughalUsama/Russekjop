<?php 
  if(($_SESSION['clubloggedin']) != "yes"){
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
			$email = $_POST["email"];
			$query="Select * from clubs where email = '$email';";
			$data = db::getInstance()->get_result($query);
            
			if($data)
			{

				$name = mysqli_escape_string(db::getInstance(),$_POST["clubname"]);
				$person = mysqli_escape_string(db::getInstance(),$_POST["contactperson"]);
				$telph = mysqli_escape_string(db::getInstance(),$_POST["telephone"]);
				$address = mysqli_escape_string(db::getInstance(),$_POST["address"]);
				$code = mysqli_escape_string(db::getInstance(),$_POST["postcode"]);
				$city = mysqli_escape_string(db::getInstance(),$_POST["city"]);
				$passwd = mysqli_escape_string(db::getInstance(),$_POST["password"]);
				
                $query="Update clubs Set club_name = \"$name\" ,contact_person = '$person' , telephone = '$telph', address = '$address', post_code = '$code', city = '$city', password = '$passwd' where email = '{$_SESSION["userdata"]["email"]}';";
                $regmsg = $query;
                if(db::getInstance()->dbquery($query))
                {
                    $regmsg = "d-flex";
                    $query1 = "Select * from clubs where email = '{$_SESSION["userdata"]["email"]}';";
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
	<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
				<div class="container">
					<div class="row mb-6 mb-lg-10 mb-xl-14">
						<div class="col-12 text-center mb-4">
							<h2 class="heading mb-3" >
								<strong class="font-weight-medium">Welcome to </strong>
								<strong class="text-danger">Russekjøp</strong>
							</h2>
							<span class="title">Your Profile</span>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6">
							<form id="reg-form" class="login-form text-center" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="clubname" id="userName" value="<?php echo($_SESSION['userdata']['club_name']); ?>" class="form-control border border-danger" placeholder="Group Name" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="contactperson" value="<?php echo($_SESSION['userdata']['contact_person']); ?>" id="userContactPerson" class="form-control border border-danger" placeholder="Contact Person" required>
								</div>
								<div class="position-relative">
									<div class="form-group mb-4 mb-lg-6">
										<input type="text" name="telephone" value="<?php echo($_SESSION['userdata']['telephone']); ?>" id="userTelephone" class="form-control border border-danger" placeholder="Telephone" required>
									</div>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="email" name="email" id="userEmail" class="form-control border border-danger" value="<?php echo($_SESSION['userdata']['email']); ?>" placeholder="Email(Username)" required readonly>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="text" name="address" id="userAddress" class="form-control border border-danger" value="<?php echo($_SESSION['userdata']['address']); ?>" placeholder="Address" required>
								</div>
								<div class="d-flex flex-row form-group mb-4 mb-lg-6">
									<input type="text" name="postcode" id="userPostCode" class=" form-control border border-danger" value="<?php echo($_SESSION['userdata']['post_code']); ?>" placeholder="Post Code" style="width: 65%;"  required>
									<input type="text" name="city" id="userCity" class=" form-control border border-danger" value="<?php echo($_SESSION['userdata']['city']); ?>" placeholder="City" style="margin-left:2.95%"  required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password" name="password" id="password" class="form-control border border-danger" value="<?php echo($_SESSION['userdata']['password']); ?>" placeholder="Password" minlength="8" required>
								</div>
								<div class="form-group mb-4 mb-lg-6">
									<input type="password"  id="confirmpassword" class="form-control border border-danger" value="<?php echo($_SESSION['userdata']['password']); ?>" placeholder="Confirm Password" minlength="8" required>
								</div>
								<div class="pt-4 mb-5">
									<button type="submit" name="update" id="userSignUpBtn" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold">Update</button>
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