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
    <link rel="stylesheet" href="./css/Styles.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
  </head>
<body>
	<header>
		<?php
		 ob_start();
		 require_once("./header.php")
		 ?>
	</header>
	<section class="container-fluid mx-0 px-0" style="margin-top:1.5%">
				<div class="container-fluid mx-0 px-0">
					<div class="row mb-6 col-12">
						<div class="col-12 text-center mb-4">
							<h2 class="heading mb-2 mt-3" >
								<strong class="font-weight-medium">Velkommen til </strong>
								<strong class="text-danger">Russekjøp</strong>
							</h2>
						</div>
					</div>
					<div class="row justify-content-center col-12 px-0 mx-0 pt-4 pb-4" style="background-image: url('./img/pictureb.png');">
					<h1 class="title mb-3">Bedriftsregister</h1>

						<div class="col-12 pt-3">
							<!-- How Russekjøp works div -->

							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="divs">
										<img class="imagesStyle" src="./img/Pictured.png" width="30%" height="75%" style="margin:auto;display: block;">
										<section><p style="font-size: 2rem;font-weight: bold">Fyll ut skjemaet</p></section>
										<p class="text-center" style="font-size: 1.1rem;padding-left: 10%;">Spar tid ved å fylle ut skjemaet. Vi innhenter tilbud fra flere leverandører. We obtain offers from several providers based on your needs.</p>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="divs">
										<img class="imagesStyle" src="./img/Picturee.png" width="30%" height="75%" style="margin:auto;display: block;">
										<section><p style="font-size:  2rem;font-weight: bold">Motta tilbud</p></section>
										<p class="text-center" style="font-size: 1.1rem;padding-left: 10%;">Motta tilbud from several different suppliers and see which offer suits you best.</p>
									</div>
								</div>
							<!-- Choose products div -->
							<!-- Contains Icon-->
								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="divs">
										<img class="imagesStyle" src="./img/Picturef.png" width="30%" height="75%" style="margin:auto;display: block;">
										<section><p style="font-size:  2rem;font-weight: bold">Velg tilbud</p></section>
										<p class="text-center" style="font-size: 1.1rem;padding-left: 10%;">Velg det beste tilbudet basert på deres behov.</p>
									</div>
								</div>
						</div>
	
						</div>
					</div>
				</div>
			</section>


<?php
require_once("./footer.php");
?>

</body>
</html>
