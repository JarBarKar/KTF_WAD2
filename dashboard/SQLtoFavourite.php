<?php
    require_once "../login_system/autoload.php";
    if(isset($_SESSION["user"])){
        $username = $_SESSION["user"];
        $dao = new RecipeDAO();
        $status = $dao->getRecipeId($username);
    }

?>