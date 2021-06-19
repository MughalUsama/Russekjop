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
    <link rel='stylesheet' type='text/css' media='screen' href='./css/addproducts.css'>
    <script src="./js/notify.min.js"></script>

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
			 
             $ac_er = "" ;
             //add category
             if (isset($_REQUEST["addcat-btn"])){
                $cat_name = mysqli_escape_string(db::getInstance(),$_REQUEST["cat-name"]);
                $query = "Select * from category where category_name = \"{$cat_name}\"";
                if(!(db::getInstance()->get_result($query)))
                {
                    $query = "Insert into category (category_name) values  (\"{$cat_name}\")";
                    db::getInstance()->dbquery($query);
                    $ac_er = "asuccess" ;
                }
                else{
                    $ac_er = "caexists" ;
                }
            }
            if (isset($_REQUEST["addpro-btn"])){
                $pro_name = mysqli_escape_string(db::getInstance(),$_REQUEST["pro-name"]);
                $cat1 = mysqli_escape_string(db::getInstance(),$_REQUEST["category1"]);
                $query = "Select * from products where product_name =\"{$pro_name}\" and category_id = \"{$cat1}\";";
                if(!db::getInstance()->get_result($query))
                {
                    $query = "Insert into products (product_name, category_id) values(\"{$pro_name}\", \"{$cat1}\");";
                    if(db::getInstance()->dbquery($query)){
                        $ac_er = "asuccess" ;
                    }
                }
                else{
                    $ac_er = "paexists" ;
                }
            }
            if (isset($_REQUEST["remcat-btn"])){
                $remcat_name = mysqli_escape_string(db::getInstance(),$_REQUEST["remcat-name"]);
            
                $query = "Select * from category where category_id = \"{$remcat_name}\"";
                if(db::getInstance()->get_result($query))
                {
                    $query = "Delete from category where category_id = \"{$remcat_name}\"";
                    db::getInstance()->dbquery($query);
                    $ac_er = "rsuccess" ;
                }
                else{
                    $ac_er = "crexists" ;
                }
            }
            if (isset($_REQUEST["rempro-btn"])){
                $query = "Select * from products where product_id =\"{$_REQUEST["rempro-name"]}\" and category_id = \"{$_REQUEST["category2"]}\"";
                if(db::getInstance()->get_result($query))
                {
                    $rm_pro_name = mysqli_escape_string(db::getInstance(),$_REQUEST["rempro-name"]);
                    $rm_cat2 = mysqli_escape_string(db::getInstance(),$_REQUEST["category2"]);
                    $query = "Delete from products where  product_id=\"{$rm_pro_name}\" and category_id=\"{$rm_cat2}\";";
                    db::getInstance()->dbquery($query);
                    $ac_er = "rsuccess" ;
                }
                else{
                    $ac_er = "prexists" ;
                }            
            }
            $query1="Select * from category;";
            $cdata = db::getInstance()->get_result($query1);
            $cdata1 = db::getInstance()->get_result($query1);
            $cdata2 = db::getInstance()->get_result($query1);

             ?>
</header>
<span id="errormsg" class="d-none <?php echo($ac_er)?>"></span>

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
            <a href="./admin.php"class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
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
    <div class="col px-0 mx-0">

    <!-- Add category-->
    <div class="row d-flex col-12 mx-0 px-0 my-bg py-3" style="font-family: 'Times New Roman', Times, serif;">
        <div class="col-12 ml-3 d-flex py-3">
            <h4 class="text-white">Add Category:</h4>
        </div>
        <div class="row col-12 justify-content-center">                
            <form class="col-12 flex-wrap d-flex justify-content-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="cat-form">
                <div class="form-group flex-wrap col-12 d-flex justify-content-center">
                    <input type="text" class="form-control col-xs-12 col-md-4 d-sm-flex d-md-inline border border-danger" id="cat-name" placeholder="Category name" name="cat-name" required>
                    <button class="form-control addcat-btn col-xs-4 col-md-2 d-sm-flex d-md-inline ml-1 btn-danger"  name="addcat-btn" id="addcat-btn"> Add</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Add category-->

    <!-- Add prod-->
    <div class="row d-flex col-12 mx-0 px-0 my-bg py-3 border-top border-secondary" style="font-family: 'Times New Roman', Times, serif;">
        <div class="col-12 ml-3 d-flex py-3">
            <h4 class="text-white">Add Products:</h4>
        </div>
        <div class="row col-12 justify-content-center">                
        <form class="col-12 flex-wrap d-flex justify-content-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="pro-form">
                    <div class="form-group flex-wrap col-12 d-flex justify-content-center">
                        <select class="form-control col-sm-12 col-md-6 border border-danger" id="category1" name="category1">
                            <option val = '-1' selected>Choose Category </option>
                            <?php 
                            while($row = mysqli_fetch_assoc($cdata))
                            {
                                echo("<option value = \"{$row['category_id']}\">{$row['category_name']}</option>");                            
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group flex-wrap col-12 d-flex justify-content-center">
                        <input type="text" class="form-control col-sm-12 col-md-4 d-sm-flex d-md-inline border border-danger" id="pro-name" placeholder="Product/Service name" name="pro-name" required>
                        <button class="form-control addpro-btn col-sm-4 col-md-2 d-sm-flex d-md-inline ml-1 btn-danger" name="addpro-btn" id="addpro-btn"> Add</button>
                    </div>
                </form>
        </div>
    </div>
    <!-- End Add prod-->

    <!-- Remove Catergory-->
    <div class="row d-flex col-12 mx-0 px-0 my-bg py-3 border-top border-secondary" style="font-family: 'Times New Roman', Times, serif;">
        <div class="col-12 ml-3 d-flex py-3">
            <h4 class="text-white">Remove Category:</h4>
        </div>
        <div class="row col-12 justify-content-center">                
        <form class="col-12 flex-wrap d-flex justify-content-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="remcat-form">
                <div class="form-group flex-wrap col-12 d-flex justify-content-center">
                    <select class="form-control col-sm-12 col-md-4 d-sm-flex d-md-inline border border-danger" id="remcat-name"  name="remcat-name">
                        <option val = '-1' selected>Choose Category </option>
                        <?php 
                        while($row = mysqli_fetch_assoc($cdata2))
                        {
                            echo("<option value = \"{$row['category_id']}\">{$row['category_name']}</option>");                            
                        }
                        ?>
                    </select>
                    <button class="form-control addcat-btn col-sm-4 col-md-2 d-sm-flex d-md-inline ml-1  btn-danger" name="remcat-btn" id="remcat-btn"> Remove</button>
                </div>
            </form>        </div>
    </div>    <!-- End Remove Catergory-->


    <!-- Remove Product-->
    <div class="row d-flex col-12 mx-0 px-0 my-bg py-3 border-top border-secondary" style="font-family: 'Times New Roman', Times, serif;">
        <div class="col-12 ml-3 d-flex py-3">
            <h4 class="text-white">Remove Products:</h4>
        </div>
        <div class="row col-12 justify-content-center">                
        <form class="col-12 flex-wrap d-flex justify-content-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="rempro-form">
            <div class="form-group flex-wrap col-12 d-flex justify-content-center">
                <select class="form-control col-sm-12 col-md-6" id="remcategory"  name="category2">
                    <option val = '-1' selected>Choose Category </option>
                    <?php 
                    while($row = mysqli_fetch_assoc($cdata1))
                    {
                        echo("<option value = \"{$row['category_id']}\">{$row['category_name']}</option>");                            
                    }
                    ?>
                </select>
            </div>
            <div class="form-group flex-wrap col-12 d-flex justify-content-center">
                <select class="form-control col-sm-12 col-md-4 d-sm-flex d-md-inline border border-danger" id="prod" name="rempro-name">
                    <option  val = '-1' selected>Choose Product/Service </option>
                </select>
                <button class="form-control rempro-btn col-sm-4 col-md-2 d-sm-flex d-md-inline ml-1 btn-danger" name="rempro-btn" id="rempro-btn"> Remove</button>
            </div>
        </form>
        </div>
    </div>    <!-- End Remove Product-->



    </div><!-- Main Col END -->


</div><!-- body-row END -->
    <!-- Page Content -->


			
		<?php
		require_once("./footer.php");
		?>

    <script src="./js/addproducts.js"></script>
    <script src="./js/sidebar.js"></script>
</body>
</html>
