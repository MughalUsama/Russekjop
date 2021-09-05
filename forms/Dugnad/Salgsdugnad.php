<?php 
$spName = "";
switch ($_REQUEST["Subproduct"]) {
    case '1':
        $spName = "Toiletpaper";
        break;
    case '2':
        $spName = "Paper towels";
        break;
    case '3':
        $spName = "Socks";
        break;
    case '4':
        $spName = "Lighter briquettes";
        break;
    case '5':
        $spName = "Cleaning products";
        break;
    case '6':
        $spName = "Cookies and Goodies";
        break;
    case '7':
        $spName = "Greeting card/Christmas card";
        break;
    case '8':
        $spName = "Cured meat & meat products";
        break;
    case '9':
        $spName = "Other";
        break; 
    default:
        # code...
        break;
}

?>
<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
    <div class="container">
        <div class="row mb-6 mb-lg-10 mb-xl-14">
            <div class="col-12 text-center mb-4">
                <h2 class="heading mb-3" >
                <strong class="text-danger">Russekjøp</strong>
                </h2>
                <span class="title">Dugnad – Salgsdugnad - <?php echo($spName)?></span> <!--Detail 3-->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <form class="Salgsdugnad-form text-center" method="POST" action="./forms/submit/detail3.php" enctype="multipart/form-data">
                    <div class="d-flex flex-row form-group mb-4 mb-lg-6">
                        <input type="number" name="numberOfPeople" id="numberOfPeople" class=" form-control border border-danger" placeholder="Number of people" style="width: 50%;"  required>
                        <input type="number" name="NumberOfSalesRound" id="NumberOfSalesRounds" class=" form-control border border-danger" placeholder="Number of sales round" style="margin-left:2.95%;width:50%"  required>
                    </div>
                    <div class="d-flex flex-row form-group mb-4 mb-lg-6">
                        <input type="number" name="NumberOfProductsPerPerson" id="NumberOfProductsPerPerson" class=" form-control border border-danger" placeholder="Number of Products Per Person" style="width:51.5%"  required>
                    </div>
                    <div class="d-none">
                        <input type="text" name="tablename" id="tablename" class="d-none" value="detail3">
                    </div>
                    <div class="d-none">
                        <input type="text" name="spid" id="spid" class="d-none" value="<?php echo($_REQUEST["Subproduct"])?>">
                    </div>
                    <div class="form-group mb-4 mb-lg-6">
                        <textarea name="description" id="paragraph_text_Salgsdugnad" cols="50" rows="10" class="form-control border border-danger" placeholder="Please provide us with additional information about your needs."></textarea>
                    </div>
                    <div class="form-group mb-4 mb-lg-6 d-flex flex-row">
                        <input class="form-control border border-danger col-6 d-flex justify-content-start" type="file" name="fileToUpload" id="fileToUpload" accept=".txt,.xlsx,.png,.jpg,.jpeg,.pdf,.pptx,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                    </div>
                    <div class="pt-4 mb-5">
                        <button type="submit" name="send" id="sendSalgsdugnad" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-top: -5%;">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>