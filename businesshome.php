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
    <link rel='stylesheet' type='text/css' media='screen' href='./css/businesshome.css'>
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
         if (!array_key_exists( "businessloggedin",$_SESSION)) {
         header("./index.php");
         exit;
        }
		 $query="Select * from category;";
		 $category_data = db::getInstance()->get_result($query);
         $newmsg = "d-none";
         $accquery = "Select * from club_requests where accepted_by =  \"{$_SESSION["userdata"]["business_id"]}\"";
         $accresult = db::getInstance()->get_result($accquery);

//		 $msgquery="Select * from offer_messages where club_id =\"{$_SESSION["userdata"]["club_id"]}\" and is_seen = 0 and sentby = 1 and status = 0;";
//         $msgdata = db::getInstance()->get_result($msgquery);
        //  if($msgdata)
        //  {
        //     $newmsg = "d-inline;";
        //  }

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
            
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPTIONS</small>
            </li>
            <!-- /END Separator -->
            <a href="./about_us.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-calendar fa-fw mr-3"></span>
                    <span class="menu-collapsed">About Us</span>
                </div>
            </a>
            <a href="./logout.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-tasks fa-fw mr-3"></span>
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
    <div class="col text-white" id="div1st">
        <div class="row py-2" >
        <div class="row col-12 py-3 ml-1 justify-content-start">
            <h2 class=" col-sm-12 col-md-8">Requests</h2>
            <div class=" col-sm-12 col-md-4">
            <!-- Button trigger modal -->
            <button type="button" id="acc-off" class="btn ml-2 col-sm-12 col-md-8 mt-1 btn-primary float-right" data-toggle="modal" data-target="#exampleModalScrollable0">
            Accepted Offers
            </button>

            </div>
        </div>  
        <div class="row pl-3 ml-2 col-12 justify-content-start">
            <div class="row d-flex col-12 mb-5 pb-2 justify-content-start" id="fillcards">    
            <h5 class="mx-auto">No Requests</h5>
            </div>
        </div>


    

</div>
<!-- Modal -->
<div class="modal  fade" id="exampleModalScrollable0" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle0" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header text-danger">
        <h5 class="modal-title" id="exampleModalScrollableTitle0">Accepted Offers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="wrappera">
        <div class="diva"></div>
      </div>
        
        <div class="table-responsive wrapperb">
        <table class="table table-striped divb text-dark">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Product</th>
            <th scope="col">Club name</th>
            <th scope="col">Size</th>
            <th scope="col">Quantity</th>
            <th scope="col">Color</th>
            <th scope="col">Description</th>
            <th scope="col">Created On</th>
            <th scope="col">Accepted On</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $count =0;
        if ($accresult) {
            while($row = $accresult->fetch_assoc())
            {
                $cquery = "Select * from category where category_id = \"{$row["category_id"]}\"";
                $cresult = db::getInstance()->get_result($cquery);
                $row1 = $cresult->fetch_assoc();
                $pquery = "Select * from products where product_id = \"{$row["product_id"]}\"";
                $presult = db::getInstance()->get_result($pquery);
                $row2 = $presult->fetch_assoc();
                $bquery = "Select * from clubs where club_id = \"{$row["club_id"]}\"";
                $bresult = db::getInstance()->get_result($bquery);
                $row3 = $bresult->fetch_assoc();
                $count = $count + 1;
                $htmlline = "<tr>
                <th scope=\"row\">$count</th>
                <td>{$row1["category_name"]}</td>
                <td>{$row2["product_name"]}</td>
                <td>{$row3["club_name"]}</td>
                <td>{$row["size"]}</td>
                <td>{$row["quantity"]}</td>
                <td>{$row["color"]}</td>
                <td><div class=\"scrollable\">{$row["description"]}</div></td>
                <td>{$row["created_on"]}</td>
                <td>{$row["accepted_on"]}</td>
                </tr>";    
                echo($htmlline);
            }
        }
        ?>
        </tbody>
        </table>      
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>

            
        </div><!-- Main Col END -->
    </div><!-- body-row END -->
    <!-- Page Content -->


			
		<?php
		require_once("./footer.php");
		?>

    <script src="./js/userhome.js"></script>
    <script src="./js/businesshome.js"></script>
    <script src="./js/sidebar.js"></script>
</body>
</html>
