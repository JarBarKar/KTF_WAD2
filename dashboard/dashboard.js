function extractFavourites(){
    var favourites = document.getElementsByClassName('id_list');
    var list_of_favourites = [];

    for(var favourite of favourites){
        list_of_favourites.push(favourite.innerHTML);
    }

    call_api(list_of_favourites, 'getFavourite');

}


function removeFavourite(id){
    //invoke remove function
    const xhr = new XMLHttpRequest();
    xhr.onload = function(){
        console.log(this.responseText)
    }
    xhr.open('GET','removeFav.php')
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send("recipe_id=" + id);
}