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
   
    <!-- Font Awesome JS -->
    <!--JQUERY AND popper   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--JQUERY AND bootstrap.js   -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/admin.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/managebusiness.css'>

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
             if (!array_key_exists( "adminloggedin",$_SESSION)) {
                header("./index.php");
                exit;
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
                    <span class="menu-collapsed">Hjem</span>
                </div>
            </a>
            <!-- Submenu content -->
            <a href="./profile.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profil</span>
                </div>
            </a>
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPTIONS</small>
            </li>
            <!-- /END Separator -->
            <a href="./about_us.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-info-circle fa-fw mr-3"></span>
                    <span class="menu-collapsed">Om oss</span>
                </div>
            </a>
            <a href="./logout.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-sign-out fa-fw mr-3"></span>
                    <span class="menu-collapsed">Logg ut</span>
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
    <div class="col pt-0">
    <div class="container-fluid px-4" id="card-container">
    <div class="row mb-3">
        <table class="table table-box table-responsive mt-4 table-striped">
            <thead>
                <tr>
                <th class="bg-info" scope="col">#</th>
                <th class="bg-info" scope="col">Bedriftsnavn</th>
                <th class="bg-info" scope="col">Email</th>
                <th class="bg-warning" scope="col"></th>
                <th class="bg-danger" scope="col"></th>
                </tr>
            </thead>
            <tbody id="table-body">
            </tbody>
            </table>
        </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable0" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle0" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle0">Delete Bedrift</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Er du sikker på at du ønsker å slette denne kontoen?
          </div>
      <div class="modal-footer">
        <button type="button" id="delete-business" class="btn btn-danger" data-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lukk</button>
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

    <script src="./js/managebusiness.js"></script>
    <script src="./js/sidebar.js"></script>
</body>
</html>
