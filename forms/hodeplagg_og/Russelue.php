<section class="create-account-sec py-8 py-md-10 py-lg-12" style="margin-top:1.5%">
    <div class="container">
        <div class="row mb-6 mb-lg-10 mb-xl-14">
            <div class="col-12 text-center mb-4">
                <h2 class="heading mb-3" >
                <strong class="text-danger">Russekjøp</strong>
                </h2>
                <span class="title">Hodeplagg og accessories – Russelue</span> <!--Detail 2-->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <form class="Russelue-form text-center" method="POST" action="./forms/submit/detail2.php" enctype="multipart/form-data">
                    <div class="d-flex flex-row form-group mb-4 mb-lg-6">
                        <input type="number" name="quantity" id="numberOfRusselue" class=" form-control border border-danger" placeholder="Antall russeluer" style="width: 50%;"  required>
                        <input type="text" name="color" id="colorOfRusselue" class=" form-control border border-danger" placeholder="Farge" style="margin-left:2.95%;width:50%"  required>
                    </div>
                    <div class="d-flex flex-row form-group mb-5 mb-lg-6">
                        <input type="text" name="size" class="form-control border border-danger" placeholder="Størrelse" id="sizeOfRusselue" style="width:48.5%;">
                    </div>
                    <div class="form-group mb-4 mb-lg-6">
                        <textarea name="description" id="paragraph_text_Russelue" cols="50" rows="10" class="form-control border border-danger" placeholder="Vær vennlig å fyll inn tilleggsinformation om deres behov."></textarea>
                    </div>
                    <div class="form-group mb-4 mb-lg-6 d-flex flex-row">
                        <input class="form-control border border-danger col-6 d-flex justify-content-start" type="file" name="fileToUpload" id="fileToUpload" accept=".txt,.xlsx,.png,.jpg,.jpeg,.pdf,.pptx,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                    </div>
                    <div class="pt-4 mb-5">
                        <button type="submit" name="send" id="sendRusselue" class="btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-top: -5%;">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>