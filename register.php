<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Kyong Tau Foo</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</head>
<body>

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

<body id="app" onload='populate_categories()'>
    <!--Navbar-->
    <div id="sticky_top" style='position: sticky'>
      <nav class="navbar navbar-expand-lg navbar-light row" style ="background-color: #FF69B4">
          <a class="navbar-brand" href="index.html">
              <img src="images/small ktf logo.png" width="85" height="40" alt="" loading="lazy" style = "margin-left:100px">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


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

	<div class="container" style="font-family: 'Itim', cursive; font-size: medium;">
		
		<center>
			<h1>Registration</h1>
		</center>

        <?php
            if(isset($_SESSION["errors"])){
                
                echo
                '<div class="alert alert-warning" role="alert"><center>';
                foreach($_SESSION["errors"] as $error){
                    echo $error.'<br>';
                }
                echo '</center></div>';

                unset($_SESSION["errors"]);
            }

        ?>

		<form method="POST" action="process_register.php">

			<div class="form-group">
				<label for="exampleInputUsername1">Username</label>
				<input type="text" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>

			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password1" class="form-control" id="exampleInputPassword1">
			</div>

			<div class="form-group">
				<label for="exampleInputPassword1">Confirm Password</label>
				<input type="password" name="password2" class="form-control" id="exampleInputPassword2">
			</div>
			
			<button type="submit" class="btn btn-primary">Submit</button><br>

			
        </form>
    </div>
    
    <!--Footer-->
    <div class="footer" style='bottom:0;'>
        <img src = "images/ktf_full_logo.png" width = 115 height = 40 style="margin-top:5px;">
        &nbsp;&nbsp;&nbsp;&nbsp;Privacy Policy&nbsp;&nbsp;&nbsp;&nbsp;Sitemap &nbsp;&nbsp;&nbsp;&nbsp;© 2020 Group 29 All Rights Reserved&nbsp;&nbsp;&nbsp;&nbsp;80 Stamford Rd, Singapore 178902
        <img src = "images/soma.png" width = 50 height = 50>
    </div>
        



<script src="js/apiConnect.js"></script>
<script src="js/categories.js"></script>
<script src="js/dropdown.js"></script>
</body>
</html>





    
    
</body>
</html>