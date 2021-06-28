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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   
    <!--JQUERY AND popper   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!--JQUERY AND bootstrap.js   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/Styles.css">
    <script src="./js/notify.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
  </head>
<body>
	<div class="wrapper">

    <!-- Sidebar -->
<!-- Bootstrap NavBar -->
<!-- Bootstrap row -->
<header>
        <?php
		 ob_start();
		 require_once("./db.php");
		 require_once("./header_user.php");
         if (!array_key_exists( "clubloggedin",$_SESSION)) {
         header("./index.php");
         exit;
        }
		 $query="Select * from category;";
		 $category_data = db::getInstance()->get_result($query);
         $newmsg = "";
		 $msgquery="Select * from offer_messages where club_id =\"{$_SESSION["userdata"]["club_id"]}\" and is_seen = 0 and sentby = 1 and status = 0;";
         $msgdata = db::getInstance()->get_result($msgquery);
         if($msgdata)
         {
            $newmsg = "<span class=\"badge badge-success\">New</span>";
         }

		 ?>
</header>
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="./index.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Homepage</span>
                </div>
            </a>
            <!-- Submenu content -->
            <a href="./profile.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span>
                </div>
            </a>
            <a href="./cluboffers.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-envelope-o fa-fw mr-3"></span>
                    <span class="menu-collapsed">My Offers<pre class="d-inline"> </pre> <?php echo($newmsg) ?> </span></div>
            </a>
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPTIONS</small>
            </li>
            <!-- /END Separator -->
            <a href="./about_us.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-info-circle fa-fw mr-3"></span>
                    <span class="menu-collapsed">About Us</span>
                </div>
            </a>
            <a href="./logout.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-sign-out fa-fw mr-3"></span>
                    <span class="menu-collapsed">Logout</span>
                </div>
            </a>
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->
            
            <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <!-- MAIN -->
    <div class="col">
    <div class="row py-5" id="div1st">
		<div class="col-md-6 col-sm-12 d-flex flex-column justify-content-center py-5" >
				<div class="py-4 mt-3" >
					<img src="./img/Picturec.png" class="tick-img"><h6 class="d-inline" style="font-weight: bold;color: black;"> Get offers from several suppliers</h6>
				</div>
				<div class="py-3">
					<img src="./img/Picturec.png" class="tick-img"><h6 class="d-inline" style="font-weight: bold;color: black;"> Choose the best offer based on your needs</h6>
				</div>
				<div class="py-4 mb-1">
					<img src="./img/Picturec.png" class="tick-img"><h6 class="d-inline" style="font-weight: bold;color: black;"> It's free and without obligation!</h6>
				</div>
		</div>
		<div class="col-md-6 col-sm-12 nopadding" >
				<div style="margin-top: 7.5%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%;">
					<h3 class="mt-2" style="font-weight: bolder;color: white;font-size: 2.3vw;"> GET NON-BINDING OFFERS – SAVE TIME AND MONEY ON YOUR PURCHASES </h3>
				</div>
                <form method="POST" action="./request.php">
                    <div class="form-group" style="margin-top: 3%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%;">
                    <select style="background-color: white; color:black;width:88%;border-color: black;" type="text" name="Category" placeholder=" Choose You Category " class="form-control" id="Category" required>
                        <option value="" style="font-weight:bold;" selected disabled>Choose Category</option>
                        <?php
                            while($row = mysqli_fetch_assoc($category_data))
                            {
                                echo("<option value = \"{$row['category_id']}\">{$row['category_name']}</option>");
                            }
						?>
                    </select>
                    </div>
                    <div class="form-group" style="margin-top: 3%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%;">
                    <select style="background-color: white; color:black;width:88%;border-color: black;" type="text" name="Product" placeholder=" Choose You Category " class="form-control" id="Product" required>
                        <option value="" style="font-weight:bold;" selected disabled>Choose Product / Service</option>
                        
                    </select>
                    </div>
				<div style="margin-top: 3.5%;margin-left: 15%;margin-bottom: 12%;">
					<button class="py-1" name="submit-next" style="background-color: black;color: white; width:22%;margin-right: 27%;float: right;" type="submit" > Next </button>
				</div>
                </form>
		</div>
	</div>


    </div><!-- Main Col END -->
</div><!-- body-row END -->
    <!-- Page Content -->


			
		<?php
		require_once("./footer.php");
		?>

    <script src="./js/userhome.js"></script>
    <script src="./js/sidebar.js"></script>
</body>
</html>
