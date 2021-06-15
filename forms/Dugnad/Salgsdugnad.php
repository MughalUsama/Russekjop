<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
    <div class="container">
        <div class="row mb-6 mb-lg-10 mb-xl-14">
            <div class="col-12 text-center mb-4">
                <h2 class="heading mb-3" >
                <strong class="text-danger">Russekjøp</strong>
                </h2>
                <span class="title">Dugnad – Salgsdugnad</span> <!--Detail 3-->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <form class="Salgsdugnad-form text-center" method="POST" action="#">
                    <div class="d-flex flex-row form-group mb-4 mb-lg-6">
                        <input type="text" name="numberOfPeople" id="numberOfPeople" class=" form-control border border-danger" placeholder="Number of people" style="width: 33%;"  required>
                        <input type="text" name="NumberOfProductsPerPerson" id="NumberOfProductsPerPerson" class=" form-control border border-danger" placeholder="Number of Products Per Person" style="margin-left:2.95%;width:33%"  required>
                        <input type="text" name="NumberOfSalesRound" id="NumberOfSalesRounds" class=" form-control border border-danger" placeholder="Number of sales round" style="margin-left:2.95%;width:33%"  required>
                    </div>
                    <label class="form-check-label" for="exampleCheck" style="font-size:105%%;margin-bottom: 5%;">Current products you want offers on  </label>
                    <div class="form-check d-flex row col-12" style="margin-bottom: 3%;margin-top: -2%;margin-left: 1.5%;padding-left: 0%;padding-right: 0%;">
                        <div class="col-6 d-flex justify-content-start">
                            <input type="checkbox" name="checkToiletpaper" id="checkToiletpaper" class="form-check-input border border-danger">
                            <label class="form-check-label" for="exampleCheck1" style="font-size:100%;">Toiletpaper </label>
                        </div>
                        <div class="col-6 d-flex justify-content-start" >
                            <input type="checkbox" name="checkPaperTowels" id="checkPaperTowels" class="form-check-input border border-danger">
                            <label class="form-check-label" for="exampleCheck2" style="font-size:100%;">Paper towels </label>
                        </div>
                    </div>

                    <div class="form-check d-flex row col-12" style="margin-bottom: 3%;margin-top: -2%;margin-left: 1.5% ;padding-left: 0%;padding-right: 0%;">
                        <div class="col-6 d-flex justify-content-start">
                            <input type="checkbox" name="checkSocks" id="checkSocks" class="form-check-input border border-danger">
                            <label class="form-check-label" for="exampleCheck3" style="font-size:100%;">Socks </label>
                        </div>
                        <div class="col-6 d-flex justify-content-start">
                            <input type="checkbox" name="checkLighterBriquettes" id="checkLighterBriquettes" class="form-check-input border border-danger">
                            <label class="form-check-label" for="exampleCheck4" style="font-size:100%;">Lighter briquettes </label>
                        </div>                    
                    </div>

                    <div class="form-check d-flex row col-12" style="margin-bottom: 3%;margin-top: -2%;margin-left: 1.5% ;padding-left: 0%;padding-right: 0%;">
                        <div class="col-6 d-flex justify-content-start">
                            <input type="checkbox" name="checkCleaningProducts" id="checkCleaningProducts" class="form-check-input border border-danger">
                            <label class="form-check-label" for="exampleCheck5" style="font-size:100%;">Cleaning products </label>
                        </div>
                        <div class="col-6 d-flex justify-content-start">
                            <input type="checkbox" name="checkCookiesAndGoodies" id="checkCookiesAndGoodies" class="form-check-input border border-danger">
                            <label class="form-check-label" for="exampleCheck6" style="font-size:100%;">Cookies and Goodies </label>
                        </div>                   
                    </div>

                    <div class="form-check d-flex row col-12" style="margin-bottom: 3%;margin-top: -2%;margin-left: 1.5% ;padding-left: 0%;padding-right: 0%;">
                        <div class="col-6 d-flex justify-content-start">
                            <input type="checkbox" name="checkGreetingCardOrChristmasCard" id="checkGreetingCardOrChristmasCard" class="form-check-input border border-danger">
                            <label class="form-check-label" for="exampleCheck7" style="font-size:100%;">Greeting card/Christmas card </label>
                        </div>
                        <div class="col-6 d-flex justify-content-start">
                            <input type="checkbox" name="checkCuredMeatSndMeatProducts" id="checkCuredMeatSndMeatProducts" class="form-check-input border border-danger">
                            <label class="form-check-label" for="exampleCheck8" style="font-size:100%;">Cured meat and meat products </label>
                        </div>                  
                    </div>

                    <div class="form-check d-flex row col-12" style="margin-bottom: 3%;margin-top: -2%;margin-left: 1.7%; padding-left: 0%;padding-right: 0%;">
                        <div class="col-12">
                            <input type="checkbox" name="checkOther" id="checkOther" class="form-check-input border border-danger">
                            <label class="form-check-label" for="exampleCheck9" style="font-size:100%;">Other </label>
                        </div> 
                    </div>

                    <div class="form-group mb-4 mb-lg-6">
                        <textarea name="paragraph_text_Salgsdugnad" id="paragraph_text_Salgsdugnad" cols="50" rows="10" class="form-control border border-danger" placeholder="Please provide us with additional information about your needs." required></textarea>
                    </div>
                    <div class="form-group mb-4 mb-lg-6 d-flex flex-row">
                        <input class="form-control border border-danger col-6 d-flex justify-content-start" type="file" name="fileToUpload" id="fileToUpload" accept=".txt,.xlsx,.png,.jpg,.jpeg,.pdf,.pptx,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                    </div>
                    <div class="pt-4 mb-5">
                        <button type="submit" name="sendSalgsdugnad" id="sendSalgsdugnad" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-top: -5%;">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>