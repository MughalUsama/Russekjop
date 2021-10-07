<?php
if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
    session_start(); //do this
}
$addclass = "";
if (array_key_exists('businessloggedin' ,$_SESSION) or array_key_exists('clubloggedin',$_SESSION) or array_key_exists('adminloggedin',$_SESSION))
{
    $addclass = "d-none";
}
?>
<nav class="pr-0 navbar d-none d-sm-flex navbar-light bg-danger py-0 my-0">
<a href="<?php if(!array_key_exists("userdata", $_SESSION)){
        echo("./company_login.php");
    }?>" class="ml-auto mr-0 pr-4 nav-item nav-link myfontTimes py-1 active font-weight-bold">
<?php 
    if(array_key_exists("userdata", $_SESSION)){
        echo("Russekjop");
    }
    else{
        echo("Bedrift Logg inn");
    }
?>

</a>
</nav>
<nav class="navbar navbar-expand-md navbar-light bg-white pb-2 pt-0" style="box-shadow: 0 4pt 2pt -2pt red;">
        <a href="./index.php" class="navbar-brand">
            <img src="./Logo.png" height="55" alt="Russekjop">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto text-center">
                <a href="./register_Group.php" class="nav-item nav-link myfontTimes active font-weight-bold text-dark <?php echo($addclass);?>">Registrer gruppe</a>
                <a href="./login.php" class="nav-item nav-link myfontTimes font-weight-bold text-dark <?php echo($addclass);?>">Logg inn</a>
                <a href="./company_login.php" class="nav-item nav-link myfontTimes font-weight-bold text-dark d-sm-none <?php echo($addclass);?>">Bedrift (Logg inn)</a>
            </div>
        </div>
    </nav>