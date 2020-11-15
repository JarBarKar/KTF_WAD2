<?php
    spl_autoload_register(function($class){
        require_once $class . ".php";
    });

    class RecipeDAO{
        function add($recipe) {
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();

            $username = $recipe->getUsername();
            $recipe_id = $recipe->getRecipeId();
            
            $sql = "insert into saved_recipes (username, recipe_id) values (:username, :recipe_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username",$username, PDO::PARAM_STR);
            $stmt->bindParam(":recipe_id",$recipe_id, PDO::PARAM_STR);
            $status = $stmt->execute();

            $stmt->closeCursor();
            $pdo = null;
            return $status;
        }

        function getRecipeId($username){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "select recipe_id from saved_recipes where username= :username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $stmt->execute();
            $result = [];
            while ($row = $stmt->fetch()){
                array_push($result, $row["recipe_id"]);
            }
            $stmt->closeCursor();
            $pdo=null;
            return $result;
        }

        function deleteRecipeId($recipe_id,$username){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "delete from saved_recipes where username= :username and recipe_id= :recipe_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":recipe_id", $recipe_id, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $status = $stmt->execute();
            
            $stmt->closeCursor();
            $pdo=null;
            return $status;
        }
    }

    

?>