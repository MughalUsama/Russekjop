<?php 
  if(($_SESSION['businessloggedin']) != "yes"){
    header("Location: ./index.php"); /* Redirect browser */
    /* Make sure that code below does not get executed when we redirect. */
    exit;
  }
?>
<header>
<?php
ob_start();
require_once("./db.php");
require_once("./header_user.php");

$query = "Select * from business_categories where business_id = \"{$_SESSION["userdata"]["business_id"]}\";";
$cdata = (db::getInstance()->get_result($query));

$errormsg = "";

if (isset($_REQUEST["update"]))
{

    $address = $_REQUEST["address"];
    $phone = $_REQUEST["btelephone"];
    $website = $_REQUEST["website"];
    $bperson = $_REQUEST["bperson"];
    $contactemail = $_REQUEST["contactemail"];
    $password = $_REQUEST["password"];
    
    $updatequery = "UPDATE business_info SET address= \"$address\",telephone=\"$phone\",website=\"$website\",contact_person=\"$bperson\",contact_email=\"$contactemail\",password=\"$password\" WHERE business_id = \"{$_SESSION["userdata"]["business_id"]}\";";
    if (db::getInstance()->dbquery($updatequery)) {
        $errormsg = "updated";
        $query = "Select * from business_info where business_id = \"{$_SESSION["userdata"]["business_id"]}\"";
        $data = db::getInstance()->get_result($query);
        if ($data)
        {
            $_SESSION['userdata'] = mysqli_fetch_assoc($data) ;
            $_SESSION['username'] = $_SESSION['userdata']['business_name'];
        }
    }
    else{
        $errormsg = "failed";
    }
}
?>
			<!-- html-->
</header>
<span id="errormsg" class="d-none <?php echo($errormsg)?>"></span>

<section class="create-account-sec py-8 py-md-10 py-lg-12">
    <div class="container">
        <div class="row mb-6 mb-lg-10 mb-xl-14">
            <div class="col-12 text-center mt-4 mb-4">
                <span class="title text-white">Din Profil</span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <form class="login-form text-center" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="breg-form" enctype="multipart/form-data">
                    <div class="form-group mb-3 mb-lg-6">
                        <input type="text" name="bname" id="businessName" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["business_name"]) ;?>" placeholder="Bedriftsnavn" required disabled>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <input type="text" name="vat" id="vat" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["vat"]) ;?>" placeholder="Org.nr" required disabled>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <input type="text" name="address" id="address" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["address"]) ;?>" placeholder="Adresse" required >
                    </div>
                    <div class="position-relative">
                        <div class="form-group mb-3 mb-lg-6">
                            <input type="text" name="btelephone" id="btelephone" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["telephone"]) ;?>" placeholder="Telefon" required>
                        </div>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <input type="email" name="bemail" id="bemail" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["business_email"]) ;?>" placeholder="Kontaktepost" required disabled>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <input type="text" name="website" id="website" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["website"]) ;?>" placeholder="Webside" required>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <input type="text" name="bperson" id="bperson" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["contact_person"]) ;?>" placeholder="Kontaktperson" required>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <input type="email" name="contactemail" id="contactemail" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["contact_email"]) ;?>" placeholder="Epost kontaktperson" required>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <input type="email" name="useremail" id="useremail" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["email"]) ;?>" placeholder="Epost (Brukernavn)" readonly>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <input type="password" name="password" id="password" class="form-control border border-danger" value="<?php echo($_SESSION["userdata"]["password"]) ;?>" placeholder="Passord" required>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <select id="category" name="categories[]" multiple class="chosen" data-placeholder="Velg kategori" disabled> 
                        <?php 
                        while($row = mysqli_fetch_assoc($cdata))
                        {
                            $query = "Select * from category where category_id = \"{$row['category_id']}\";";
                            $categorydata = (db::getInstance()->get_result($query));
                            if ($categorydata) {
                                $row1 = mysqli_fetch_assoc($categorydata);
                                echo("<option value = \"{$row['category_id']}\"  selected>{$row1['category_name']}</option>");                            
                                }
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                        <select id="prod"  multiple class="chosen" data-placeholder="Velg produkt" disabled>
                        <?php
                    
                        $query = "Select * from business_products where business_id = \"{$_SESSION["userdata"]["business_id"]}\";";
                        $pdata = (db::getInstance()->get_result($query));

                        while($row = mysqli_fetch_assoc($pdata))
                        {
                            $query = "Select * from products where product_id = \"{$row['product_id']}\";";
                            $categorydata = (db::getInstance()->get_result($query));
                            if ($categorydata) {
                                $row1 = mysqli_fetch_assoc($categorydata);
                                echo("<option value = \"{$row['product_id']}\"disabled selected>{$row1['product_name']}</option>");                            
                                }
                        }
                        ?>    
                        </select>
                    </div>
                    <div class="form-group mb-3 mb-lg-6">
                    <select id="counties"  multiple class="chosen" data-placeholder="Velg salgssteder" disabled>
                    <option value="-1"></option>
                        <option value="Hele Norge (all over the country)">Hele Norge (all over the country)</option>
                        <option value="Oslo">Oslo</option>
                        <option value="Rogaland">Rogaland</option>
                        <option value="Møre og Romsdal">Møre og Romsdal</option>
                        <option value="Nordland">Nordland</option>
                        <option value="Viken">Viken</option>
                        <option value="Innlandet">Innlandet</option>
                        <option value="Vestfold og Telemark">Vestfold og Telemark</option>
                        <option value="Agder">Agder</option>
                        <option value="Vestland">Vestland</option>
                        <option value="Trøndelag">Trøndelag</option>
                        <option value="Troms og Finnmark">Troms og Finnmark</option>
                    </select>
                    </div>
                    <div class="pt-2 mb-5">
                        <button type="submit" name="update" id="regsub-btn" class="border border-white btn btn-lg py-1 btn-danger text-capitalize font-weight-bold" style="float:right;margin-bottom: 8%;">Oppdater</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="./js/register_group.js"></script>
<script src="./js/business_registration.js"></script>
