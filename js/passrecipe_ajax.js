function passrecipe(){
    var recipe = document.getElementById("recipeID").value;
    // console.log(recipe);
    const xhr = new XMLHttpRequest();
    xhr.onload = function(){
        console.log("Successful")
    }
    xhr.open('POST','login_system/recipe.php')
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send("recipe=" + recipe);
}

