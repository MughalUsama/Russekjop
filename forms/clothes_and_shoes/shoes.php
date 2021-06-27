<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
    <div class="container">
        <div class="row mb-6 mb-lg-10 mb-xl-14">
            <div class="col-12 text-center mb-4">
                <h2 class="heading mb-3" >
                <strong class="text-danger">Russekjøp</strong>
                </h2>
                <span class="title">Clothes and shoes – Shoes</span> <!--Detail 2-->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <form class="Shoes-form text-center" method="POST" action="./forms/submit/detail2.php" enctype="multipart/form-data">
                    <div class="d-flex flex-row form-group mb-4 mb-lg-6">
                        <input type="number" name="quantity" id="numberOfShoes" class=" form-control border border-danger" placeholder="Number of shoes" style="width: 50%;"  required>
                        <input type="text" name="color" id="colorOfShoes" class=" form-control border border-danger" placeholder="Color" style="margin-left:2.95%;width:50%"  required>
                    </div>
                    <div class="d-flex flex-row form-group mb-4 mb-lg-6">
                        <input type="text" name="size" class="form-control border border-danger" id="sizeOfShoes" placeholder="Size" style="width:48.5%">
                    </div>
                    <div class="form-group mb-4 mb-lg-6">
                        <textarea name="description" id="paragraph_text_Shoes" cols="50" rows="10" class="form-control border border-danger" placeholder="Please provide us with additional information about your needs."></textarea>
                    </div>

                    <div class="form-group mb-4 mb-lg-6 d-flex flex-row">
                        <input class="form-control border border-danger col-6 d-flex justify-content-start" type="file" name="fileToUpload" id="fileToUpload" accept=".txt,.xlsx,.png,.jpg,.jpeg,.pdf,.pptx,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                    </div>
                    <div class="pt-4 mb-5">
                        <button type="submit" name="send" id="sendShoes" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-top: -5%;">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>