<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Kyong Tau Foo</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src='bower_components/typeahead.js/dist/typeahead.bundle.min.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3b3172378c.js" crossorigin="anonymous"></script>

</head>

<body id="app" onload='populate_categories();call_api(1,"getRandom"); populate_carousel();'>
    <!--Navbar-->
    <?php
    session_start();
    ?>
    <div id="sticky_top" style='position: sticky; z-index: 5;'>
      <nav class="navbar navbar-expand-lg navbar-light row" style ="background-color: #FF69B4">
          <a class="navbar-brand" href="index.php">
              <img src="images/small ktf logo.png" width="85" height="40" alt="" loading="lazy" style = "margin-left:100px">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <!--Search Bar-->
          <div class="container row" style="width:40%; margin-left : 80px">
              <div class="row">
                <form class="form-inline col-12 mb-2"  id='search_box'>
                    <input id='ingredient_input' class="form-control mr-2 typeahead" type="search" placeholder="Find an Ingredient" aria-label="Search" style=" font-family: 'Itim',cursive;">
                    <button class="btn btn-sm btn-outline-dark my-2 my-sm-0" type="submit"  onClick="populate_searchbox();return false">Add</button>
                  </form>
        
                  <!--Selected ingredients-->  
                  <div class = "d-inline col-12" style="word-wrap:break-word">
                      <div id="search_tags" style="font-family: 'Itim',cursive">
        
                      </div>
                  </div>
              </div>
          </div>


          <!--Right navigation bar-->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style = "margin-right: 0px; font-family: 'Itim', cursive; font-size: small;">
              <li class="nav-item active" >
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="allrecipe.php">Browse all recipes</a>
              </li>
              <?php
                if(!isset($_SESSION['user'])){
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Sign up/Sign in</a>
                    </li>';
                }
                if(isset($_SESSION['user'])){
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login_system/logout.php">Sign Out</a>
                    </li>';
                }
              ?>
            </ul>
          </div>

      </nav>


   

      <!--Categories-->
      <div id="categories">
          <nav class="navbar navbar-expand-lg navbar-light row" style ="padding-top: 0; padding-left: 0; padding-right: 0; ">
            <button class="navbar-toggler bg-warning" type="button" data-toggle="collapse" data-target="#categoryNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="margin-left: 33%">
                <span>Show Categories</span>
            </button>
            <div class="collapse navbar-collapse" id="categoryNavDropdown">
                <ul id='navbar' class="navbar-nav col" style="font-family: 'Itim', cursive; font-size: medium; margin-right: 0; padding-right: 0;">
            
                </ul>
            </div>
          </nav>
        </div>
      </div>

    <!--Display cards-->

    <div class = "row">
        <div class = "card-columns" id = "card-columns"  style=" width:80%; margin: auto;margin-top: 30px;">

        </div>
    </div>


    <!--Error Message-->
    <div id = "error-msg" class='container d-flex justify-content-center mb-3'>

    </div>




<!--Carousel-->
<div class="container d-flex justify-content-center mb-5">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval= "4000" style= "width: 60%;">

    <div class="carousel-inner" style='border-style:solid; border-color:black;' id="carousellocation">
      

    </div>
    <a class='carousel-control-prev' href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    


<!--footer-->
<div class="footer">
  <img src = "images/ktf_full_logo.png" width = 115 height = 40 style="margin-top:5px;">
  &nbsp;&nbsp;&nbsp;&nbsp;Privacy Policy&nbsp;&nbsp;&nbsp;&nbsp;Sitemap &nbsp;&nbsp;&nbsp;&nbsp;© 2020 Group 29 All Rights Reserved&nbsp;&nbsp;&nbsp;&nbsp;80 Stamford Rd, Singapore 178902
  <img src = "images/soma.png" width = 50 height = 50>

</div>
  


<script src="js/apiConnect.js"></script>
<script src="js/categories.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/carouseldata.js"></script>
<script src="js/login.js"></script>
</body>
</html>




