<?php
    require_once "../login_system/autoload.php";
    if(isset($_SESSION["user"])){
        $id = $_POST["recipe_id"];
        $username = $_SESSION["user"];
        $dao = new RecipeDAO();
        $status = $dao->deleteRecipeId($id,$username);
    }
?>