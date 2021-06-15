<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
    <div class="container">
        <div class="row mb-6 mb-lg-10 mb-xl-14">
            <div class="col-12 text-center mb-4">
                <h2 class="heading mb-3" >
                <strong class="text-danger">Russekjøp</strong>
                </h2>
                <span class="title">Clothes and shoes – T-Shirts</span> <!--Detail 1-->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <form class="TShirts-form text-center" method="POST" action="#">
                    <div class="d-flex flex-row form-group mb-4 mb-lg-6">
                        <input type="text" name="numberOfTShirts" id="numberOfTShirts" class=" form-control border border-danger" placeholder="Number of t-shirts" style="width: 33%;"  required>
                        <input type="text" name="colorOfTShirts" id="colorOfTShirts" class=" form-control border border-danger" placeholder="Color" style="margin-left:2.95%;width:33%"  required>
                        <select type="text" name="sizeOfTShirts" class="form-control border border-danger" id="sizeOfTShirts" style="margin-left:2.95%;width:33%">
                            <option value="" selected disabled>Size</option>
                            <option>Small=3</option>
                            <option>Medium=4</option>
                            <option>Large=5</option>
                            <option>X-large=6</option>
                        </select>
                    </div>
                    <div class="form-check d-flex flex-row" style="margin-bottom: 3%;margin-top: -2%;">
                        <label class="form-check-label" for="exampleCheck1" style="font-size:95%;">Print </label>
                        <input type="checkbox" name="printTShirts" id="printTShirts" class="form-check-input border border-danger">
                    </div>
                    <div class="form-group mb-4 mb-lg-6">
                        <textarea name="paragraph_text_TShirts" id="paragraph_text_TShirts" cols="50" rows="10" class="form-control border border-danger" placeholder="Please provide us with additional information about your needs." required></textarea>
                    </div>
                    <div class="form-group mb-4 mb-lg-6 d-flex flex-row">
                        <input class="form-control border border-danger col-6 d-flex justify-content-start" type="file" name="fileToUpload" id="fileToUpload" accept=".txt,.xlsx,.png,.jpg,.jpeg,.pdf,.pptx,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                    </div>
                    <div class="pt-4 mb-5">
                        <button type="submit" name="sendTShirts" id="sendTShirts" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-top: -5%;">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>