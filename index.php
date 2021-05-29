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
    <link rel="stylesheet" href="styles.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
  </head>
<body>
	<header>
		<?php
		 require_once("./header.php")
		 ?>
	</header>
	<div class="row" id="div1st">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 d-flex flex-column justify-content-center py-4" >
				<div class="py-2" >
					<img src="Picture3.png" class="tick-img"><h4 class="d-inline" style="font-weight: bold;color: black;"> Get offers from several suppliers</h4>
				</div>
				<div class="py-2">
					<img src="Picture3.png" class="tick-img"><h4 class="d-inline" style="font-weight: bold;color: black;"> Choose the best offer based on your needs</h4>
				</div>
				<div class="py-2">
					<img src="Picture3.png" class="tick-img" ><h4 class="d-inline" style="font-weight: bold;color: black;"> It's free and without obligation!</h4>
				</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding" >
				<div style="margin-top: 7.5%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%;">
					<h3 style="font-weight: bolder;color: white;font-size: 2.7vw;"> GET NON-BINDING OFFERS – SAVE TIME AND MONEY ON YOUR PURCHASES </h3>
				</div>
				<div class="form-group" style="margin-top: 3%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%;">
				  <label style="color: white;" for="Category">Choose You Category:</label>
				  <select style="background-color: transparent;width:88%;border-color: black;" type="text" name="Category" placeholder=" Choose You Category " class="form-control" id="Category">
				    <option>1</option>
				    <option>2</option>
				    <option>3</option>
				    <option>4</option>
				  </select>
				</div>
				<div class="form-group" style="margin-top: 3%;margin-left: 15%;margin-bottom: 3%;margin-right: 15%;">
					<label style="color: white;" for="Product">Choose product/service:</label>
				  <select style="background-color: transparent;width:88%;border-color: black;" type="text" name="Category" placeholder=" Choose You Category " class="form-control" id="Product">
				    <option>1</option>
				    <option>2</option>
				    <option>3</option>
				    <option>4</option>
				  </select>
				</div>
				<div style="margin-top: 3%;margin-left: 15%;margin-bottom: 12%;">
					<button class="py-1" style="background-color: black;color: white; width:22%;margin-right: 27%;float: right;" type="submit" > Next </button>
				</div>
		</div>
	</div>
	<h1 id="menu-heading" style="text-align: center;margin-top: 5%;margin-bottom: 3%;">How Russekjøp works</h1>
	
	<!-- How Russekjøp works div -->
	<div class="row">
  		<div class="col-lg-4 col-md-4 col-sm-12">
  			<div class="divs">
  				<img class="imagesStyle" src="Picture4.png" width="30%" height="75%" style="margin:auto;display: block;">
  				<section><p style="font-size: 2.4vw;font-weight: bold">Fill out the form</p></section>
  				<p class="text-center" style="padding-left: 10%;">Save time by simply filling out the form. We obtain offers from several providers based on your needs.</p>
  			</div>
  		</div>

  		<div class="col-lg-4 col-md-4 col-sm-12">
  			<div class="divs">
  				<img class="imagesStyle" src="Picture5.png" width="30%" height="75%" style="margin:auto;display: block;">
  				<section><p style="font-size: 2.4vw;font-weight: bold">Receive offers</p></section>
  				<p class="text-center" style="padding-left: 10%;">Receive offers from several different suppliers and see which offer suits you best.</p>
  			</div>
  		</div>


    <!-- Choose products div -->
	<!-- Contains Icon-->
  		<div class="col-lg-4 col-md-4 col-sm-12">
  			<div class="divs">
  				<img class="imagesStyle" src="Picture6.png" width="30%" height="75%" style="margin:auto;display: block;">
  				<section><p style="font-size: 2.4vw;font-weight: bold">Choose offer</p></section>
  				<p class="text-center" style="padding-left: 10%;">Choose the best offer based on your needs.</p>
  			</div>
  		</div>
  </div>
  <div class="pb-5" style="background-color:red;">
  	<h4 class= "pt-5 pb-3" id="menu-heading" style="text-align: center; margin-top: 3%;margin-bottom: 3%;font-weight: bold">Save money on various purchases and collaborations</h4>
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

		<div class="col-lg-6 col-md-6 col-sm-6 p-0 m-0 bimage" onclick="window.location='http://google.com';">
			<div class="divs">
				<img class="imagesStyle img-fluid col-12 p-0 m-0" src="./img/Picture20.png">
			</div>
		</div>
	</div>
  
<?php
require_once("./footer.php");
?>
<script src="./js/index.js"></script>

</body>
</html>
