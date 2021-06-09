<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
    <div class="container">
        <div class="row mb-6 mb-lg-10 mb-xl-14">
            <div class="col-12 text-center mb-4">
                <h2 class="heading mb-3" >
                <strong class="font-weight-medium">Welcome to </strong>
                <strong class="text-danger">Russekjøp</strong>
                </h2>
                <span class="title">Clothes and shoes – Salgsdugnad</span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <form class="Salgsdugnad-form text-center" method="POST" action="#">
                    <div class="d-flex flex-row form-group mb-4 mb-lg-6">
                        <input type="text" name="numberOfSalgsdugnad" id="numberOfSalgsdugnad" class=" form-control border border-danger" placeholder="Number of salgsdugnad" style="width: 33%;"  required>
                        <input type="text" name="colorOfSalgsdugnad" id="colorOfSalgsdugnad" class=" form-control border border-danger" placeholder="Color" style="margin-left:2.95%;width:33%"  required>
                        <select type="text" name="sizeOfSalgsdugnad" class="form-control border border-danger" id="sizeOfSalgsdugnad" style="margin-left:2.95%;width:33%">
                            <option value="" selected disabled>Size</option>
                            <option>Small=3</option>
                            <option>Medium=4</option>
                            <option>Large=5</option>
                            <option>X-large=6</option>
                        </select>
                    </div>
                    <label class="form-check-label" for="exampleCheck" style="font-size:105%%;margin-bottom: 4%;">Current products you want offers on  </label>
                    <div class="form-check d-flex flex-row" style="margin-bottom: 3%;margin-top: -2%; width: 100%;padding-left: 0%;padding-right: 0%;">
                        <div class="d-flex flex-row" style="width:33.3%;padding-left: 4%;">
                            <input type="checkbox" name="checkToiletpaper" id="checkToiletpaper" class="form-check-input border border-danger" required>
                            <label class="form-check-label" for="exampleCheck1" style="font-size:100%;">Toiletpaper </label>
                        </div>
                        <div class="d-flex flex-row" style="width:33.3%;padding-left: 4%;">
                            <input type="checkbox" name="checkPaperTowels" id="checkPaperTowels" class="form-check-input border border-danger" required>
                            <label class="form-check-label" for="exampleCheck2" style="font-size:100%;">Paper towels </label>
                        </div>
                        <div class="d-flex flex-row" style="width:33.3%;padding-left: 4%;">
                            <input type="checkbox" name="checkSocks" id="checkSocks" class="form-check-input border border-danger" required>
                            <label class="form-check-label" for="exampleCheck3" style="font-size:100%;">Socks </label>
                        </div>                    
                    </div>

                    <div class="form-check d-flex flex-row" style="margin-bottom: 3%;margin-top: -2%; width: 100%;padding-left: 0%;padding-right: 0%;">
                        <div class="d-flex flex-row" style="width:33.3%;padding-left: 4%;">
                            <input type="checkbox" name="checkLighterBriquettes" id="checkLighterBriquettes" class="form-check-input border border-danger" required>
                            <label class="form-check-label" for="exampleCheck4" style="font-size:100%;">Lighter briquettes </label>
                        </div>
                        <div class="d-flex flex-row" style="width:33.3%;padding-left: 4%;">
                            <input type="checkbox" name="checkCleaningProducts" id="checkCleaningProducts" class="form-check-input border border-danger" required>
                            <label class="form-check-label" for="exampleCheck5" style="font-size:100%;">Cleaning products </label>
                        </div>
                        <div class="d-flex flex-row" style="width:33.3%;padding-left: 4%;">
                            <input type="checkbox" name="checkCookiesAndGoodies" id="checkCookiesAndGoodies" class="form-check-input border border-danger" required>
                            <label class="form-check-label" for="exampleCheck6" style="font-size:100%;">Cookies and Goodies </label>
                        </div>                    
                    </div>

                    <div class="form-check d-flex flex-row" style="margin-bottom: 3%;margin-top: -2%; width: 100%;padding-left: 0%;padding-right: 0%;">
                        <div class="d-flex flex-row" style="width:33.3%;padding-left: 4%;">
                            <input type="checkbox" name="checkGreetingCard/ChristmasCard" id="checkGreetingCard/ChristmasCard" class="form-check-input border border-danger" required>
                            <label class="form-check-label" for="exampleCheck7" style="font-size:100%;">Greeting card/Christmas card </label>
                        </div>
                        <div class="d-flex flex-row" style="width:33.3%;padding-left: 4%;">
                            <input type="checkbox" name="checkCuredMeatSndMeatProducts" id="checkCuredMeatSndMeatProducts" class="form-check-input border border-danger" required>
                            <label class="form-check-label" for="exampleCheck8" style="font-size:100%;">Cured meat and meat products </label>
                        </div>
                        <div class="d-flex flex-row" style="width:33.3%;padding-left: 4%;">
                            <input type="checkbox" name="checkOther" id="checkOther" class="form-check-input border border-danger" required>
                            <label class="form-check-label" for="exampleCheck9" style="font-size:100%;">Other </label>
                        </div>                    
                    </div>

                    <div class="form-group mb-4 mb-lg-6">
                        <textarea name="paragraph_text_Salgsdugnad" id="paragraph_text_Salgsdugnad" cols="50" rows="10" class="form-control border border-danger" placeholder="Please provide us with additional information about your needs." required></textarea>
                    </div>
                    <div class="pt-4 mb-5">
                        <button type="submit" name="sendSalgsdugnad" id="sendSalgsdugnad" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-top: -5%;">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>