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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src='bower_components/typeahead.js/dist/typeahead.bundle.min.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3b3172378c.js" crossorigin="anonymous"></script>

</head>
<body style = "background-color: #f4c2c2;">
  <div class="container-fluid">

    <!-- <script type="text/javascript" src="js/dropdown.js"></script> -->

    <!-- CSS -->
    <style>
        
    </style>
</head>

<body style = "background-color: black"  onload="populateRecipe();recipeImageRandom()">
    <!--Navbar-->
    <?php session_start()?>
    <div id="sticky_top" style='position: sticky'>
      <nav class="navbar navbar-expand-lg navbar-light row" style ="background-color: #FF69B4; position: sticky">
          <a class="navbar-brand" href="index.php">
              <img src="images/small ktf logo.png" width="85" height="40" alt="" loading="lazy" style = "margin-left:100px">
          </a>
          <!--Save recipe-->
          <!-- <form action="integration.php" method="post">
            <input type="hidden" name="recipe" id="recipe" value="">
            <input type="submit" value="Save this recipe!">
          </form> -->
          <?php
            if(isset($_SESSION['user'])){
                echo "
                <center><button id='save_button' type='button' style = 'text-align:center;' class='mx-auto btn btn-warning' onclick='passrecipe(); switch_save_click()'>Save this Recipe!</button></center>";
            } 
          ?>
          <!--End of Save recipe-->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <!--Right navigation bar-->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style = "margin-right: 0px; font-family: 'Itim', cursive; font-size: large;">
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

      <!-- Main page container -->
      <div class="container-fluid row mt-3" style = "font-family: 'Itim', cursive;" >

        <!-- everything besides video-->
        <div class="container row col-12 col-lg-10">

        <!-- image+summary -->
        <div class="container-fluid row">

            <!-- image -->
          <div class="container col-12 col-sm-5 col-lg-4">
            <img id="recipeImage" src='https://spoonacular.com/recipeImages/955152-556x370.jpg' class="img-fluid" alt="" style = "border-style: solid; border-color:black;">
            <img id="recipeFillerImage" src="images/random/sakura.png" class="img-fluid d-none d-sm-none d-md-block" alt="" height='10'>
          </div>

          <!-- summary -->
          <div class="container col-12 col-sm-7 col-lg-8">
            <span id='recipeID' value=''></span>
            <h1 id="recipeTitle" class = "bg-warning" style = "border-style: solid; border-color:black;">Recipe title</h1>
            <div id="recipeDiet">
            <img id="recipeFillerImage" src="images/sakura.png" class="img-fluid d-none d-sm-none d-md-block" alt="">

            </div>
            <div style ="border-style: solid; border-radius: 3%; font-size: small;" id="recipeSummary">summary</div>
            <div class = "mt-3" style ="border-style: solid; border-radius: 3%;" id="recipeServing">serves 4 adult Cooks in 15 minutes </div>
            <div class="container mt-3" style= "padding-left: 0; border-style: solid; background-color: white;">
            
              Nutrition per serving
                <table class="table container-fluid col" style=' background-color: white; table-layout: fixed; font-size: xx-small;'>
                    <thead>
                      <tr>
                        <th >Calories</th>
                        <th >Fat</th>
                        <th >Sugars</th>
                        <th >Salt</th>
                        <th >Protein</th>
                        <th >Carbs</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="nutriunit">
                        
                      </tr>
                      <tr id="nutripercent">
                        
                      </tr>
                    
                    </tbody>
                  </table>
                *of an adult's reference intake
            </div>
          </div>
        </div>

        <div class="container-fluid row mt-3">
        <!-- ingredients -->
        <div class="container col-12 col-sm-6 col-lg-4" style = "border-style: solid; border-color:black; background-color: #ffff66">
              <h2>Ingredients</h2>
              <div>
                <ul  id="recipeIngredients">

                </ul>
              </div>

          </div>


        <!-- steps -->
        <div class="container col-12 col-sm-6 col-lg-7" style = "border-style: solid; border-color:black; background-color: #ffff99">
              <h2>Instructions</h2>
              <div>
                <ol id="recipeInstructions">

                </ol>
              </div>

  
            </div>
        </div>
        

      </div>

      <!-- youtube video-->
      <div class="container col-12 col-sm-2"  >
        <span>Related Videos:</span>
        <div id="recipeVideo" style ="border-style: solid;">

        </div>
      </div>

      </div>
    </div>





</div>
</div>


<div class="footer">
    <img src = "images/ktf_full_logo.png" width = 115 height = 40 style="margin-top:5px;">
    &nbsp;&nbsp;&nbsp;&nbsp;Privacy Policy&nbsp;&nbsp;&nbsp;&nbsp;Sitemap &nbsp;&nbsp;&nbsp;&nbsp;© 2020 Group 29 All Rights Reserved&nbsp;&nbsp;&nbsp;&nbsp;80 Stamford Rd, Singapore 178902
    <img src = "images/soma.png" width = 50 height = 50>
</div>

    



<script src="js/random.js"></script>
<script src="js/apiConnect.js"></script>
<script src="js/categories.js"></script>
<script src="js/dropdown.js"></script>
<script src='js/passrecipe_ajax.js'></script>
</script>
</body>
</html>




