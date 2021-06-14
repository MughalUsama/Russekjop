<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
    <div class="container">
        <div class="row mb-6 mb-lg-10 mb-xl-14">
            <div class="col-12 text-center mb-4">
                <h2 class="heading mb-3" >
                <strong class="text-danger">Russekjøp</strong>
                </h2>
                <span class="title">Grafisk design – Banner</span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <form class="Banner-form text-center" method="POST" action="#">
                    <div class="d-flex flex-row justify-content-between form-group mb-5 mb-lg-6">
                        <input type="text" name="NumberOfBanner" id="NumberOfBanner" class=" form-control border border-danger col-4 d-flex justify-content-start" placeholder="Number of banners" required>
                        
                        <select type="text" name="sizeOfBanner" class="form-control border border-danger col-4 d-flex" id="sizeOfBanner">
                            <option value="" selected disabled>Size</option>
                            <option>Small=3</option>
                            <option>Medium=4</option>
                            <option>Large=5</option>
                            <option>X-large=6</option>
                        </select>
                    </div>
                    <div class="form-group mb-4 mb-lg-6">
                        <textarea name="paragraph_text_Banner" id="paragraph_text_Banner" cols="50" rows="10" class="form-control border border-danger" placeholder="Please provide us with additional information about your needs." required></textarea>
                    </div>
                    <div class="pt-4 mb-5">
                        <button type="submit" name="sendBanner" id="sendBanner" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-top: -5%;">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>