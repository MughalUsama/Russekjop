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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/Styles.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/companyregister.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
  </head>
<body>
	<header>
		<?php
     ob_start();
     require_once("./db.php");
		 require_once("./header.php")
		 ?>
	</header>
	<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
				<div class="container">
          <img class="img-fluid mx-auto col-12 top-img" style="max-height: 200px;" src="." alt="RUSSEKJOP">
          <div class="row d-flex col-12 pb-1 my-3 justify-content-center">
              <h3 class="text-center">Company Register</h3>
          </div>
          <div class="row d-flex col-12 pb-1 justify-content-center ml-0">
            <div class="row d-flex col-12 justify-content-center align-items-center py-0" id="search-div">
                <p class="hide-xs mx-auto col-md-3 mt-3" style="font-size: 1.1rem;"> Search <i class="fa fa-search" aria-hidden="true"></i></p>
                <input type="text" class="d-inline col-xs-12 col-md-9 form-control " id="search-txt" name="search-txt" placeholder="Type here to search">
            </div>
          </div>
        
        <!--dynamic content below -->
        <div class="row d-flex my-3 col-12 pt-5 justify-content-between align-items-start" id="scontent">
        
        <?php 
        //     $query = "Select Distinct(category_id) from business_categories Order by category_id;";
        //     $result = db::getInstance()->get_result($query);
        //     $categories = array();
        //     if($result)
        //     {
        //         while($row = mysqli_fetch_assoc($result)){
        //             array_push($categories,$row);
        //         }
        //     }
        //     foreach($categories as $category)
        //     {
        //         $query1 = "Select * from category where category_id = {$category["category_id"]};";
        //         $result = db::getInstance()->get_result($query1);
        //         $row = mysqli_fetch_assoc($result);
        //         $query2 = "Select * from business_categories where category_id = {$category["category_id"]};";
        //         $result2 = db::getInstance()->get_result($query2);
        //         $disp = "<div class=\"row col-xs-12 px-0 col-md-4 d-flex justify-content-center\">";
        //         $disp = $disp."<h6 class = \"row ml-auto px-0 mt-4 mb-2 justify-content-center col-12 cname\"><b>{$row["category_name"]}</b></h6>";
        //         while($row2 = mysqli_fetch_assoc($result2))
        //         {
        //             $query2 = "Select * from business_info where business_id = {$row2["business_id"]} and business_id in (Select business_id from business_sports where sports_name = \"Football\" or sports_name = \"Handball\" or sports_name = \"Ishockey\" );";
        //             $result3 = db::getInstance()->get_result($query2);
        //             $row3 = mysqli_fetch_assoc($result3);
        //             $disp = $disp."<p class = \"row ml-auto my-0 px-0 justify-content-center col-12 bname\" currentbid = \"{$row2["business_id"]}\"><u>".$row3["business_name"]."</u></p>";
        //         }
        //         $disp = $disp."</div>";
        //         echo($disp);
        //     }
        // ?>

        </div>


        </div>
  </section>

<?php
require_once("./footer.php");
?>

</body>
<!-- Development -->
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>


</html>
