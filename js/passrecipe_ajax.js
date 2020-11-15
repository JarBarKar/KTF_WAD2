function passrecipe(){
    var recipe = document.getElementById("recipeTitle").innerText;
    const xhr = new XMLHttpRequest();
    xhr.onload = function(){
        console.log(recipe)
    }
    xhr.open('POST','dom.php')
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send("recipe=" + recipe);
}