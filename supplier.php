<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>SportsReg</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="./img/color-Russekjob-logo-ai.png"/>
    <!--bootstrap   -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--JQUERY AND popper   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!--JQUERY AND bootstrap.js   -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./css/supplier.css'>
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

<div class="container-fluid bg-white text-dark pb-3" id="part-container">
    <div class="container col-10 pr-0" id="outline-term">

        <div class="row d-flex col-12 pb-1" id="center-page">
            <div class="d-none d-md-flex col-md-6 mt-5 pt-5 pb-5" id="partner-img" ></div>
            <div class="col-12 col-md-6">
                <div class="row pt-4 mt-4 pb-1 col-12 ml-1 d-flex justify-content-center">
                <h2>Bli en <span class="text-danger">leverand??r</span></h2>
                </div>
                <!-- first paragraph-->
                <p class="ml-1 mt-2 mb-2 pb-2 col-12 text-justify">
                Er din bedrift p?? utkikk etter flere kunder, eller har som m??l ?? ??ke salget og inntjeningen? Russekj??p er derfor den foretrukne plattformen.
                </p>
                <p class="ml-1 mt-1 mb-2 pb-2 col-12 text-justify">
                Ved ?? registrere seg som leverand??r vil din bedrift f?? direkte tilgang til planlagte kj??p fra russegrupper. Dette gir dere muligheten til ?? kjempe om nye kunder og nye salg.
                </p>
                <p class="ml-1 mt-1 mb-2 pb-2 col-12 text-justify">
                Ved siden av ovennevnte vil din bedrift ogs?? bli registret i v??rt??leverand??rregister??og vi tilbyr tilgang til kj??p av innholdsmarkedsf??ring i v??re kanaler.                
                </p>
                <p class="ml-1 mt-1 mb-2 pb-2 col-12 text-justify">
                Dersom dette h??res interessant ut ??? kontakt oss i skjemaet nedenfor. Dere vil s?? bli kontaktet av oss i l??pet av kort tid.
            </div>
            <!-- second paragraph-->
            <!-- Button trigger modal -->
<a class="ml-auto mr-4" href="./contact_us.php"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
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
