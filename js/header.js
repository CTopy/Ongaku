"use strict"
document.addEventListener("DOMContentLoaded",initialiser);
    
function initialiser(evt){
     var menuDeroulant = document.getElementById("iconeMenu");
     menuDeroulant.addEventListener("click", cliquer); 

}   
    
    
function cliquer(evt){
    document.querySelector("nav").classList.toggle("apparaitre") ;
    
    var image = document.getElementById("iconeMenu");
//    console.log(image.getAttribute("src"));
    
    if(image.getAttribute("src") == "medias/images/deroulant.png"){
        image.src = "medias/images/croixMenuDeroulant.png";
        
        
    }else{
         image.src = "medias/images/deroulant.png";
    }
}