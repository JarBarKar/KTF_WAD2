<?php
    session_start();
    require_once "autoload.php";
    if(isset($_SESSION["user"])){
        $username = $_SESSION["user"];
        $recipe_id = $_POST['recipe'];
        $dao = new RecipeDAO();
        $recipe = new Recipe($username, $recipe_id);
        $status = $dao->add($recipe);

        if ($status){
            echo "YAY";
        }
        else{
            echo "FUCK";
        }

    }
?>