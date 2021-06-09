
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Russekjob</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="./img/color-Russekjob-logo-ai.png"/>
    <!--bootstrap   -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--JQUERY AND popper   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!--JQUERY AND bootstrap.js   -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./css/about_us.css'>
    <link rel="stylesheet" href="./css/Styles.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>

</head>
<body>

<header>
		<?php
		 require_once("./header.php")
		 ?>
</header>

<div class="container-fluid bg-dark text-white pb-3" id="part-container">
    <div class="container col-10 pr-0" id="outline-term">

        <div class="row d-flex col-12 pb-1" id="center-page">
            <div class="d-none d-md-flex col-md-6 mt-5 pt-5 pb-5" id="partner-img" ></div>
            <div class="col-12 col-md-6">
                <div class="row pt-4 mt-3 pb-1 col-12 ml-1 d-flex justify-content-center">
                <h2>About Us</h2>
                </div>
                <!-- first paragraph-->
                <p class="ml-1 mt-1 mb-3 pb-2 col-12 text-justify">
                Text on this page needs to be changed.......... Russekjøp er derfor den foretrukne plattformen.
                </p>
                <p class="ml-1 mt-1 mb-3 pb-2 col-12 text-justify">
                Ved å registrere seg som leverandør vil din bedrift få direkte tilgang til planlagte kjøp fra russegrupper. Dette gir dere muligheten til å kjempe om nye kunder og nye salg.
                </p>
                <p class="ml-1 mt-1 mb-3 pb-2 col-12 text-justify">
                Ved siden av ovennevnte vil din bedrift også bli registret i vårt leverandørregister og vi tilbyr tilgang til kjøp av innholdsmarkedsføring i våre kanaler.                
                </p>
                <p class="ml-1 mt-1 mb-3 pb-2 col-12 text-justify">
                Dersom dette høres interessant ut – kontakt oss i skjemaet nedenfor. Dere vil så bli kontaktet av oss i løpet av kort tid.
            </div>
            <!-- second paragraph-->
            <!-- Button trigger modal -->
<a class="ml-auto mr-4" href="./contactus.php"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
  Kontakt oss
</button></a>
        </div>
    </div>
</div>




<!-- Footer --><?php
require_once("./footer.php");
?>
<!-- Footer -->
</body>


</html>
