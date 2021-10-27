<?php
session_start();
?>

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
         ob_start();
		 require_once("./header.php")
		 ?>
</header>

<div class="container-fluid bg-white text-dark pb-3" id="part-container">
    <div class="container col-10 pr-0" id="outline-term">

        <div class="row d-flex col-12 pb-1" id="center-page">
            <div class="d-none d-md-flex col-md-6 mt-5 pt-5 pb-5" id="partner-img" ></div>
            <div class="col-12 col-md-6">
                <div class="row pt-4 mt-3 pb-1 col-12 ml-1 d-flex justify-content-center">
                <h3 class="justify-content-center">Vi reduserer tid og kostnad<span class="text-danger"> – </span> og bidrar til økt inntjening</h3>
                </div>
                <!-- first paragraph-->
                <pre style="font-size: 6px;">
                </pre>
                <p class="ml-1 mt-1 mb-2 pb-2 col-12 text-justify">
                Russetiden er en kjent og kjær tid hvor endt skolegang skal feires. Mye skal planlegges og organiseres. Oppgaver skal fordeles. Penger skal tjenes. Innkjøp skal gjøres. Ved siden av dette skal du gjerne også forsøke å avslutte skolegangen på en god måte. Det sier seg selv at dette er en stressende og altoppslukende hverdag, og vi vet hvor tidskrevende det er å manøvrere seg blant den store mengden av tilbydere for å finne frem til tilbudet som passer din gruppe best. 
                </p>
                <p class="ml-1 mt-1 mb-2 pb-2 col-12 text-justify">
                Det ønsket vi å gjøre noe med – derav Russekjøp. 
                </p>

            </div>
            <!-- second paragraph-->
            <p class="ml-0 mt-4 mb-3 pb-2 col-12 text-justify">
                Russekjøp er en markedsplass hvor din russegruppe helt kostnadsfritt kan registrere deres forespørsel på et tenkt produkt- eller tjenestekjøp. Forespørselen blir deretter automatisk sendt til våre leverandørbedrifter, som så besvarer med et tilbud på den registrerte forespørselen. Russegruppen vil deretter få tilsendt tilbud fra én eller flere tilbydere.
            </p>
            <p class="ml-1 mt-0 mb-2 pb-2 col-12 text-justify">
            Tjenesten bidrar til at deres russegruppe reduserer tid på å undersøke, kontakte og diskutere kjøp med flere ulike leverandører. Hos Russekjøp når man alle på en gang. I tillegg bidrar tjenesten til at din russegruppe vil kunne spare penger på deres kjøp – da de ulike tilbyderne gjerne vil kjempe for deres bestilling, ved å tilby et konkurransedyktig tilbud slik at de vinner en ny kunde og ordre. Tjenesten vil også kunne bidra til økt inntjening ved at dere får et bedre økonomisk tilbud ved salg av dugnadsprodukter. 
            </p>
            <p class="ml-1 mt-0 mb-3 pb-2 col-12 text-justify">
            Registrer din russegruppe i dag, og benytt Russekjøp helt kostnadsfritt. Benytter dere Russekjøp ved deres kjøp er dere hvert kvartal med i trekningen av ulike premier fra våre leverandører.
            </p>

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
