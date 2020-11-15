<?php
    class Recipe {
        private $username;
        private $recipe_id;
    
        function __construct($username, $recipe_id){
            $this->username = $username;
            $this->recipe_id = $recipe_id;
        }
    
        public function getUsername() {
            return $this->username;
        }
    
        public function getRecipeId() {
            return $this->recipe_id;
        }
    
    
    }
?>