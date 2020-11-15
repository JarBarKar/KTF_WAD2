<?php
    require_once "autoload.php";

    $username = "kennethlekk";
    $recipe_id = 1234;
    $dao = new RecipeDAO();
    $recipe = new Recipe($username, $recipe_id);
    $status = $dao->add($recipe);

    if ($status){
        echo "YAY";
    }
    else{
        echo "FUCK";
    }

?>