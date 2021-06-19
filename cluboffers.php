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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--JQUERY AND popper   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!--JQUERY AND bootstrap.js   -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>	
    <!--JQUERY AND bootstrap.js   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/Styles.css">
    <script src="./js/notify.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/cluboffers.css'>
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
            $allquery = "Select * from club_requests where club_id = \"{$_SESSION["userdata"]["club_id"]}\"";
            $allresult = db::getInstance()->get_result($allquery);
            $accquery = "Select * from club_requests where club_id = \"{$_SESSION["userdata"]["club_id"]}\" and accepted_by is NOT NULL";
            $accresult = db::getInstance()->get_result($accquery);

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
                    <span class="menu-collapsed">My Offers </span>                </div>
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
    <div class="col">
        <nav class="mt-2" aria-label="...">
            <ul class="pagination pagination-md  justify-content-end">
                <li class="page-item" aria-current="page">
                <span class="page-link bg-danger border-danger text-white" id="off-tab">Offers</span>
                </li>
                <li class="page-item"><a class="page-link text-danger border-danger" id="all-req" >All Requests</a></li>
                <li class="page-item"><a class="page-link text-danger border-danger" id="acc-off" >Accepted Offers</a></li>
            </ul>
        </nav>
        
        <div class="accordion col-12 mb-5 pb-2 justify-content-start" id="accordionExample">
        <!-- cards here -->
        </div>
        <div class="table-responsive" id="ar-table">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Product</th>
            <th scope="col">Accepted-By</th>
            <th scope="col">Size</th>
            <th scope="col">Quantity</th>
            <th scope="col">Color</th>
            <th scope="col">Description</th>
            <th scope="col">Created On</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $count =0;
        if ($allresult) {
            while($row = $allresult->fetch_assoc())
            {
                $cquery = "Select * from category where category_id = \"{$row["category_id"]}\"";
                $cresult = db::getInstance()->get_result($cquery);
                $row1 = $cresult->fetch_assoc();
                $pquery = "Select * from products where product_id = \"{$row["product_id"]}\"";
                $presult = db::getInstance()->get_result($pquery);
                $row2 = $presult->fetch_assoc();
                $count = $count + 1;
                $htmlline = "<tr>
                <th scope=\"row\">$count</th>
                <td>{$row1["category_name"]}</td>
                <td>{$row2["product_name"]}</td>
                <td>{$row["size"]}</td>
                <td>{$row["quantity"]}</td>
                <td>{$row["color"]}</td>
                <td><div class=\"scrollable\">{$row["description"]}</div></td>
                <td>{$row["created_on"]}</td>
                </tr>";
                echo($htmlline);
            }
        }
        ?>
        </tbody>
        </table>
        </div>

        <div class="table-responsive" id="acc-table">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Product</th>
            <th scope="col">Accepted-By</th>
            <th scope="col">Size</th>
            <th scope="col">Quantity</th>
            <th scope="col">Color</th>
            <th scope="col">Description</th>
            <th scope="col">Created On</th>
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
                $bquery = "Select * from business_info where business_id = \"{$row["accepted_by"]}\"";
                $bresult = db::getInstance()->get_result($bquery);
                $row3 = $bresult->fetch_assoc();
                $count = $count + 1;
                $htmlline = "<tr>
                <th scope=\"row\">$count</th>
                <td>{$row1["category_name"]}</td>
                <td>{$row2["product_name"]}</td>
                <td>{$row3["business_name"]}</td>
                <td>{$row["size"]}</td>
                <td>{$row["quantity"]}</td>
                <td>{$row["color"]}</td>
                <td><div class=\"scrollable\">{$row["description"]}</div></td>
                <td>{$row["created_on"]}</td>
                </tr>";
                echo($htmlline);
            }
        }
        ?>
        </tbody>
        </table>
        </div>

    </div><!-- Main Col END -->
</div><!-- body-row END -->
    <!-- Page Content -->


			
		<?php
		require_once("./footer.php");
		?>


    <script src="./js/sidebar.js"></script>
    <script src="./js/cluboffers.js"></script>

</body>
</html>
