<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Russekjøp</title>
	<link rel="icon" href="./img/color-Russekjob-logo-ai.png"/>
    <!--bootstrap   -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   
    <!-- Font Awesome JS -->
    <!--JQUERY AND popper   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--JQUERY AND bootstrap.js   -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/footer.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/admin.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/managenews.css'>
  </head>
<body>
	<div class="wrapper">

    <!-- Sidebar -->
<!-- Bootstrap NavBar -->
<!-- Bootstrap row -->
<header>
			<?php
             ob_start();
             require_once("./db.php");
			 require_once("./header_user.php");
             $successmsg = "";
             if (!array_key_exists( "adminloggedin",$_SESSION)) {
                header("./index.php");
                exit;
               }

			 ?>
</header>
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="./index.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Homepage</span>
                </div>
            </a>
            <!-- Submenu content -->
            <a href="./profile.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span>
                </div>
            </a>
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPTIONS</small>
            </li>
            <!-- /END Separator -->
            <a href="./about_us.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-info-circle fa-fw mr-3"></span>
                    <span class="menu-collapsed">About Us</span>
                </div>
            </a>
            <a href="./logout.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-sign-out fa-fw mr-3"></span>
                    <span class="menu-collapsed">Logout</span>
                </div>
            </a>
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->
            
            <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <!-- MAIN -->
    <div class="col pt-0 px-0 mx-0">
    <div class="container-fluid px-0" id="card-container">
<?php 
    if (isset($_REQUEST["addnews"])){
    $headline = mysqli_escape_string(db::getInstance(), $_REQUEST["newsheadline"]);
    $description = mysqli_escape_string(db::getInstance(), $_REQUEST["newsdescription"]);
    $topnews = "0";
    $latestnews = "0";
    if(isset($_REQUEST["topnews"]))
    {
        $topnews = "1";
        $updatetop = "Update news Set top_news = \"0\"";
        if(!db::getInstance()->dbquery($updatetop))
        {
            echo("Something went wrong. Try again later");
        }
    }
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["postimage"]["tmp_name"]);
    $newname = "";
    if($check !== false) {
        $uploadOk = 1;
        $info = pathinfo($_FILES['postimage']['name']);
        $ext = $info['extension']; // get the extension of the file
        $nameid = uniqid();
        $newname = $nameid.".".$ext; 
        $target = 'news/'.$newname;
        move_uploaded_file( $_FILES['postimage']['tmp_name'], $target);
    }

    $addnews ="INSERT INTO `news`(`news_headline`, `news_description`, `image_name`, `top_news`) VALUES (\"$headline\",\"$description\",\"$newname\",\"$topnews\")";
    if(db::getInstance()->dbquery($addnews))
    {
        $successmsg = "Post added successfully";
    }
    else{
        $successmsg = "Post cannot added successfully";
    }
}
$allnews = "SELECT * FROM news ORDER BY top_news DESC , posted_on DESC";
$getallnews = db::getInstance()->get_result($allnews);
?>

    <div class="d-flex jusitfy-content-center align-items-center flex-wrap col-12 px-0 mx-0" id="news-body">

    <div class="ml-0 col-12 py-1 d-flex jusitfy-content-center align-items-center row rounded border border-info bg-secondary">
    <h3 class="pt-1 text-white">Add new Post/News</h3>
    </div>
    <!-- NEWS BOXES BELOW -->
    <div class="news-start ml-0 col-12 d-flex jusitfy-content-center align-items-center row rounded border border-info bg-dark">
    <div class="col-sm-12 col-md-3">
                <table class="mx-auto" CELLPADDING="70">
                    <tbody>
                        <tr>
                            <td class="bg-white">
                            <img class="col-12 my-1 bg-white news-img d-none" src="" alt="Add Image" width="125" id="news-img"/> 
                            </td>
                        </tr>
                    </tbody>
                </table>
    </div>
    <div class="col-sm-12 py-2 my-2 col-md-9 rounded border border-info bg-secondary newsclass">
    <!-- form -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="addnewsform" enctype="multipart/form-data">
    <div class="form-group">
        <h6 class="text-success"><?php echo($successmsg); ?></h6>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">News/Post Headline:</label>
        <textarea class="form-control" placeholder="Write News/Post Headline" name="newsheadline" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea2">News Description:</label>
        <textarea class="form-control" placeholder="Write News/Post Description" name="newsdescription" id="exampleFormControlTextarea2" rows="5" required></textarea>
    </div>
    <div class="form-group">
    <label for="postimage">Select Image:</label>
        <input type="file" accept=".gif,.png.,.jpg,.jpeg,.jpeg" class="form-control-file" id="postimage" name="postimage" required>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="topnews" type="checkbox" id="topnews" value="1" >
        <label class="form-check-label" for="topnews">Top News</label>
    </div>
    <div class="form-check-inline float-right col-auto">
      <button type="submit" class="btn btn-primary mb-2" name="addnews">Add News</button>
    </div>
    <div class="form-check col-auto mt-2">
     <p class="ml-1 mt-3">
        Top News = News at the top of the page<br>
    </p>
    </div>
</form>
</div>


</div>

    <!-- ending box container  -->
</div>
<div class="d-flex mb-0 pb-0 px-0 mx-0 jusitfy-content-center align-items-center flex-wrap col-12">

<table class="table table-hover table-dark mb-0 rounded border border-info">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Headline</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Posted on</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php 
    if($getallnews)
    {   //loop and print
        $serial_num = 0;
        while($nnews = mysqli_fetch_assoc($getallnews))
        {
            $serial_num+=1;
            echo '<tr>';
            echo '<th scope="row">'.$serial_num.'</th>';
            echo '<td colspan="3">'.$nnews["news_headline"].'</td>';
            echo '<td>'.$nnews["posted_on"].'</td>';
            echo '<td><button class="btn btn-danger delete-news" news-id="'.$nnews["news_id"].'">Delete</button></td>';
            echo '<td><form action="editpost.php" method="POST" class="d-inline"><input class="d-none" name="editnewsid" value = "'.$nnews["news_id"].'" type="number" ><button type="submit" name="edit-btn" class="btn btn-warning edit-news" news-id="'.$nnews["news_id"].'">Edit</button></form></td>';
            echo '</tr>';
        }
    }
  
  ?>
  </tbody>
</table>

</div>

    </div>


    </div><!-- Main Col END -->
</div><!-- body-row END -->
    <!-- Page Content -->


			
		<?php
		require_once("./footer.php");
		?>

    <script src="./js/managenews.js"></script>

    <script src="./js/sidebar.js"></script>
</body>
</html>
