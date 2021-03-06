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
                <h3 class="justify-content-center">Vi reduserer tid og kostnad<span class="text-danger"> ??? </span> og bidrar til ??kt inntjening</h3>
                </div>
                <!-- first paragraph-->
                <pre style="font-size: 6px;">
                </pre>
                <p class="ml-1 mt-1 mb-2 pb-2 col-12 text-justify">
                Russetiden er en kjent og kj??r tid hvor endt skolegang skal feires. Mye skal planlegges og organiseres. Oppgaver skal fordeles. Penger skal tjenes. Innkj??p skal gj??res. Ved siden av dette skal du gjerne ogs?? fors??ke ?? avslutte skolegangen p?? en god m??te. Det sier seg selv at dette er en stressende og altoppslukende hverdag, og vi vet hvor tidskrevende det er ?? man??vrere seg blant den store mengden av tilbydere for ?? finne frem til tilbudet som passer din gruppe best. 
                </p>
                <p class="ml-1 mt-1 mb-2 pb-2 col-12 text-justify">
                Det ??nsket vi ?? gj??re noe med ??? derav Russekj??p. 
                </p>

            </div>
            <!-- second paragraph-->
            <p class="ml-0 mt-4 mb-3 pb-2 col-12 text-justify">
                Russekj??p er en markedsplass hvor din russegruppe helt kostnadsfritt kan registrere deres foresp??rsel p?? et tenkt produkt- eller tjenestekj??p. Foresp??rselen blir deretter automatisk sendt til v??re leverand??rbedrifter, som s?? besvarer med et tilbud p?? den registrerte foresp??rselen. Russegruppen vil deretter f?? tilsendt tilbud fra ??n eller flere tilbydere.
            </p>
            <p class="ml-1 mt-0 mb-2 pb-2 col-12 text-justify">
            Tjenesten bidrar til at deres russegruppe reduserer tid p?? ?? unders??ke, kontakte og diskutere kj??p med flere ulike leverand??rer. Hos Russekj??p n??r man alle p?? en gang. I tillegg bidrar tjenesten til at din russegruppe vil kunne spare penger p?? deres kj??p ??? da de ulike tilbyderne gjerne vil kjempe for deres bestilling, ved ?? tilby et konkurransedyktig tilbud slik at de vinner en ny kunde og ordre. Tjenesten vil ogs?? kunne bidra til ??kt inntjening ved at dere f??r et bedre ??konomisk tilbud ved salg av dugnadsprodukter. 
            </p>
            <p class="ml-1 mt-0 mb-3 pb-2 col-12 text-justify">
            Registrer din russegruppe i dag, og benytt Russekj??p helt kostnadsfritt. Benytter dere Russekj??p ved deres kj??p er dere hvert kvartal med i trekningen av ulike premier fra v??re leverand??rer.
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
