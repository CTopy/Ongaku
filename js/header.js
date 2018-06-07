"use strict"
document.addEventListener("DOMContentLoaded",initialiser);
    
function initialiser(evt){
     var menuDeroulant = document.getElementById("iconeMenu");
     menuDeroulant.addEventListener("click", cliquer); 

}   
    
    
function cliquer(evt){
    document.querySelector(".menuDeroulant").classList.toggle("apparaitre") ;
    
    var image = document.getElementById("iconeMenu");
    console.log(image.getAttribute("src"));
    
    if(image.getAttribute("src") == "medias/images/deroulant.jpg"){
        image.src = "medias/images/croixMenuDeroulant.jpg";
        image.style.height="30px";
        
    }else{
         image.src = "medias/images/deroulant.jpg";
    }
}