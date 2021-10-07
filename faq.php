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
    <link rel="stylesheet" href="./css/Styles.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
	<link rel='stylesheet' type='text/css' media='screen' href='./css/faq.css'>

  </head>
<body>
	<header>
		<?php
		 ob_start();
		 require_once("./header.php")
		 ?>
	</header>
	<div class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
		<div class="container">
			<div class="row mb-6 mb-lg-10 mb-xl-14">
				<div class="col-12 text-center mb-4">
					<h2 class="heading mb-3" >
						<strong class="font-weight-medium">Velkommen til </strong>
						<strong class="text-danger">Russekjøp</strong>
					</h2>
					<h1 class="title mt-4">FAQs</h1>
				</div>
			</div>
			<div class="row justify-content-center mb-5">
				<div class="accordion accordion-flush" id="accordionFlushExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingOne">
						<button class="accordion-button collapsed bg-danger" style="padding: 1.4rem; font-size:1.2rem;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
						Er det gratis å registrere en kjøpsforespørsel?						
						</button>
						</h2>
						<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
						<div class="accordion-body">- Ja, det er helt gratis for din russegruppe å registrere en forespørsel på <a class="text-danger" href="https://russekjøp.no"> russekjøp.no</a>.</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingTwo">
						<button class="accordion-button collapsed bg-danger" style="padding: 1.4rem; font-size:1.2rem;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
						Hvem kan registrere en forespørsel?						
						</button>
						</h2>
						<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
						<div class="accordion-body">- Du må være over 18 år for å registrere en forespørsel på russekjøp.no. Er du kommende russ men fortsatt ikke fylt 18 år, kan en foresatt eller ansvarlig person over 18 år registrere en forespørsel på vegne av deg eller din russegruppe.</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingThree">
						<button class="accordion-button collapsed bg-danger" style="padding: 1.4rem; font-size: 1.2rem;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
						Må det foretas et kjøp etter at man har mottatt et tilbud?						
						</button>
						</h2>
						<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body">- Det er ikke noe krav om å foreta et kjøp etter at forespørselen din er registrert og du har mottatt et tilbud fra én eller flere av våre samarbeidsleverandører.
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingFour">
						<button class="accordion-button collapsed bg-danger" style="padding: 1.4rem; font-size: 1.2rem;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
						Dersom man aksepterer et tilbud, er avtalen bindende?
						</button>
						</h2>
						<div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body">- Avtalen er bindende dersom det er gitt aksept på et mottatt tilbud.</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingFive">
						<button class="accordion-button collapsed bg-danger" style="padding: 1.4rem; font-size: 1.2rem;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
						Lages det en avtale med Russekjøp eller den aktuelle leverandøren?
						</button>
						</h2>
						<div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body">- Det er din russegruppe og den respektive leverandøren som er ansvarlige parter i avtalen. Russekjøp er kun en formidler, og står ikke ansvarlig for avtalen mellom partene. 
						</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>


<?php
require_once("./footer.php");
?>

</body>
</html>
