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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!--JQUERY AND bootstrap.js   -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/Styles.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
  </head>
<body>
	<header>
		<?php
		 ob_start();
		 require_once("./db.php");
		 require_once("./header.php");

		 $query="Select * from category;";
		 $category_data = db::getInstance()->get_result($query);
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
	  
		 
		 ?>
	</header>
	<div class="row py-5" id="div1st">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 d-flex flex-column justify-content-center py-4" >
				<div class="py-2" >
					<img src="./img/Picturec.png" class="tick-img"><h5 class="d-inline" style="font-weight: bold;color: black;"> Få tilbud fra flere leverandører</h5>
				</div>
				<div class="py-2">
					<img src="./img/Picturec.png" class="tick-img"><h5 class="d-inline" style="font-weight: bold;color: black;"> Velg det beste tilbudet basert på deres behov</h5>
				</div>
				<div class="py-2">
					<img src="./img/Picturec.png" class="tick-img" ><h5 class="d-inline" style="font-weight: bold;color: black;"> Det er gratis og uforpliktende!</h5>
				</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding" >
				<div style="margin-top: 7.5%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%;">
					<h3 style="color: white;font-size: 2.6vw;"> FÅ UFORPLIKTENDE TILBUD - SPAR TID OG PENGER PÅ DINE KJØP </h3>
				</div>
				<form action="./login.php">
				<div class="form-group" style="margin-top: 3%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%;">
				  <select style="background-color: white; color:black; width:88%;border-color: black;" type="text" name="Category" placeholder=" Choose You Category " class="form-control" id="Category">
				  	<option value="" style="font-weight:bold;" selected disabled>Velg Kategori</option>
					  <?php
                            while($row = mysqli_fetch_assoc($category_data))
                            {
                                echo("<option value = \"{$row['category_id']}\">{$row['category_name']}</option>");
                            }
						?>
				  </select>
				</div>
				<div class="form-group" style="margin-top: 3%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%;">
				  <select style="background-color: white; color:black; width:88%;border-color: black;" type="text" name="Category" placeholder=" Choose You Category " class="form-control" id="Product">
				  	<option value="" style="font-weight:bold;" selected disabled>Velg produkt / tjeneste</option>
				    
				  </select>
				</div>
				<div class="form-group" style="margin-top: 3%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%; display:none" id="subproduct-div">
				  <select style="background-color: white; color:black; width:88%;border-color: black;" type="text" name="Subproduct" placeholder=" Choose You Sub Product " class="form-control" id="Sub-Product">
				  	<option value="" style="font-weight:bold;" selected disabled>Choose Sub Product</option>
					<option value="1">Toiletpaper</option>
					<option value="2">Paper towels</option>
					<option value="3">Socks</option>
					<option value="4">Lighter briquettes</option>
					<option value="5">Cleaning products</option>
					<option value="6">Cookies and Goodies</option>
					<option value="7">Greeting card/Christmas card</option>
					<option value="8">Cured meat & meat products</option>
					<option value="9">Other</option>					
				  </select>
				</div>
				<div style="margin-top: 3.5%;margin-left: 15%;margin-bottom: 12%;">
					<button class="py-1" type="submit" style="background-color: black;color: white; width:22%;margin-right: 27%;float: right;" type="submit" > Neste </button>
				</div>
				</form>
		</div>
	</div>
	<h1 id="menu-heading" style="text-align: center;margin-top: 5%;margin-bottom: 3%;">Hvordan fungerer det</h1>
	
	<!-- How Russekjøp works div -->
	<div class="row">
  		<div class="col-lg-4 col-md-4 col-sm-12">
  			<div class="divs">
  				<img class="imagesStyle" src="./img/Pictured.png" width="30%" height="75%" style="margin:auto;display: block;">
  				<section><p style="font-size: 2.4vw;font-weight: bold">Fyll ut skjemaet</p></section>
  				<p class="text-center" style="padding-left: 10%;">Spar tid ved å fylle ut skjemaet. Vi innhenter tilbud fra flere leverandører.</p>
  			</div>
  		</div>

  		<div class="col-lg-4 col-md-4 col-sm-12">
  			<div class="divs">
  				<img class="imagesStyle" src="./img/Picturee.png" width="30%" height="75%" style="margin:auto;display: block;">
  				<section><p style="font-size: 2.4vw;font-weight: bold">Motta tilbud</p></section>
  				<p class="text-center" style="padding-left: 10%;">Motta tilbud fra flere forskjellige leverandører og se hvilket tilbud som passer deg best.</p>
  			</div>
  		</div>


    <!-- Choose products div -->
	<!-- Contains Icon-->
  		<div class="col-lg-4 col-md-4 col-sm-12">
  			<div class="divs">
  				<img class="imagesStyle" src="./img/Picturef.png" width="30%" height="75%" style="margin:auto;display: block;">
  				<section><p style="font-size: 2.4vw;font-weight: bold">Velg tilbud</p></section>
  				<p class="text-center" style="padding-left: 10%;">Velg det beste tilbudet basert på deres behov.</p>
  			</div>
  		</div>
  </div>
  <div class="pb-5" style="background-color:red;">
  	<h4 class= "pt-5 pb-3" id="menu-heading" style="text-align: center; margin-top: 3%;margin-bottom: 3%;font-weight: bold">Spar penger på ulike kjøp og samarbeid</h4>
	  <div class="row">
	  		<div class="col-lg-3 col-md-3 col-sm-12">
	  			<div class="divs">
	  				<img class="imagesStyle" src="./img/Picture11.png" width="38%" height="59%" style="margin:auto;display: block;">
	  				<section><h6 style="color: white;">Musikkanlegg</h6></section>
	  			</div>
	  		</div>

	  		<div class="col-lg-3 col-md-3 col-sm-12">
	  			<div class="divs">
	  				<img class="imagesStyle" src="./img/Picture12.png" width="38%" height="59%" style="margin:auto;display: block;">
	  				<section><h6 style="color: white;">Graffiti og foliering</h6></section>
	  			</div>
	  		</div>

	  		<div class="col-lg-3 col-md-3 col-sm-12">
	  			<div class="divs">
	  				<img class="imagesStyle" src="./img/Picture13.png" width="38%" height="59%" style="margin:auto;display: block;">
	  				<section><h6 style="color: white;">Russebuss</h6></section>
	  			</div>
	  		</div>

	  		<div class="col-lg-3 col-md-3 col-sm-12">
	  			<div class="divs">
	  				<img class="imagesStyle" src="./img/Picture14.png" width="38%" height="59%" style="margin:auto;display: block;">
	  				<section><h6 style="color: white;">Bussjåfør</h6></section>
	  			</div>
	  		</div>

	  		<div class="col-lg-3 col-md-3 col-sm-12">
	  			<div class="divs">
	  				<img class="imagesStyle" src="./img/Picture15.png" width="38%" height="59%" style="margin:auto;display: block;">
	  				<section><h6 style="color: white;">Dugnad</h6></section>
	  			</div>
	  		</div>

	  		<div class="col-lg-3 col-md-3 col-sm-12">
	  			<div class="divs">
	  				<img class="imagesStyle" src="./img/Picture16.png" width="38%" height="59%" style="margin:auto;display: block;">
	  				<section><h6 style="color: white;">Russeklær</h6></section>
	  			</div>
	  		</div>

	  		<div class="col-lg-3 col-md-3 col-sm-12">
	  			<div class="divs">
	  				<img class="imagesStyle" src="./img/Picture17.png" width="38%" height="59%" style="margin:auto;display: block;">
	  				<section><h6 style="color: white;">Dj og russesang </h6></section>
	  			</div>
	  		</div>

	  		<div class="col-lg-3 col-md-3 col-sm-12">
	  			<div class="divs">
	  				<img class="imagesStyle" src="./img/Picture18.png" width="38%" height="59%" style="margin:auto;display: block;">
	  				<section><h6 style="color: white;">Russelogo</h6></section>
	  			</div>
	  		</div>
	  </div>
  </div>

<!--		Bottom images -->
	  <div class="row bottom-images">
		<div class="col-lg-6 col-md-6 col-sm-6 p-0 m-0 cimage" onclick="window.location='./supplier.php';">
			<div class="divs ">
				<img class="imagesStyle img-fluid col-12 p-0 m-0"  src="./img/Picture19.png">
			</div>
		</div>
		<div class="divider d-md-none d-none d-md-flex"></div>

		<div class="col-lg-6 col-md-6 col-sm-6 p-0 m-0 bimage" onclick="window.location='./blog.php';">
			<div class="divs">
				<img class="imagesStyle img-fluid col-12 p-0 m-0" src="./img/Picture-news.png">
			</div>
		</div>
	</div>
  
<?php
require_once("./footer.php");
?>
<script src="./js/index.js"></script>

</body>
</html>
