<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://kit.fontawesome.com/3b3172378c.js" crossorigin="anonymous"></script>

  </head>
  <body onload='extractFavourites()'>
  <?php session_start() ?>
        <!--Navbar-->
        <div id="sticky_top" style='position: sticky'>
          <nav class="navbar navbar-expand-lg navbar-light row" style ="background-color: #FF69B4">
              <a class="navbar-brand" href="../index.php">
                  <img src="../images/small ktf logo.png" width="85" height="40" alt="" loading="lazy" style = "margin-left:100px">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <!--Right navigation bar-->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" style = "margin-right: 0px; font-family: 'Itim', cursive; font-size: small;">
                  <li class="nav-item active" >
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../allrecipe.php">Browse all recipes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../login_system/logout.php">Logout</a>
                  </li>
                </ul>
              </div>
          </nav>
        </div>

        <!-- Personal Details on Left Sidebar -->
        <div class="container">
            <div class="container">
                <div class="content d-flex justify-content-center">
       
                <center>
                    <img src="../images/random/sakura.png" style="margin: 10px" alt="" class="profile_image">

                    <div class="mb-2" style="font-family: 'Itim', cursive; font-size: medium;">
                        <h4><?php echo $_SESSION['user']?></h4>
                        <h4>Saved Recipes</h4>
                    </div>
                </center>
                </div>

                <!--Display Card-->
                <div>
                    <div class = "row">
                        <div class = "card-columns" id = "dashboard-card-columns"  style=" width:80%; margin: auto;margin-top: 20px;">
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>





        <!--dom-target style display none--> 
        <div id="dom-target">
            <?php
                require_once "SQLtoFavourite.php";
                foreach($status as $id){
                    echo "
                    <span class='id_list' style='display:none'>$id</span>";
                };
            ?>
        </div>

        <!--Footer-->
        <div class="footer">
            <img src = "../images/ktf_full_logo.png" width = 115 height = 40 style="margin-top:5px;">
            &nbsp;&nbsp;&nbsp;&nbsp;Privacy Policy&nbsp;&nbsp;&nbsp;&nbsp;Sitemap &nbsp;&nbsp;&nbsp;&nbsp;© 2011 Group 29 All Rights Reserved&nbsp;&nbsp;&nbsp;&nbsp;80 Stamford Rd, Singapore 178902
            <img src = "../images/soma.png" width = 50 height = 50>
        </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="../js/categories.js"></script>
    <script src="../js/apiConnect.js"></script>
    <script src="dashboard.js"></script>
    <!-- <script src="/js/dashboard.js"></script> -->

  </body>
</html>