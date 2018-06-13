"use strict"
document.addEventListener("DOMContentLoaded",initialiser);
    
function initialiser(evt){
     var menuDeroulant = document.getElementById("iconeMenu");
     menuDeroulant.addEventListener("click", cliquer); 
    
var regles = document.getElementById("iconeRegle");
     regles.addEventListener("click", cliquer2);

}   
    
    
function cliquer(evt){
    document.querySelector(".menuDeroulant").classList.toggle("apparaitre");
    
    var image = document.getElementById("iconeMenu");
//    console.log(image.getAttribute("src"));
    
    if(image.getAttribute("src") == "medias/images/deroulant.png"){
        image.src = "medias/images/croixMenuDeroulant.png";
        
        
    }else{
         image.src = "medias/images/deroulant.png";
    }
}



function cliquer2(evt){
    document.querySelectorAll(".menuDeroulant")[1].classList.toggle("apparaitre") ;
    
    var image = document.getElementById("iconeRegle");
    
    if(image.getAttribute("src") == "medias/images/boutonLivreFerme.png"){
        image.src = "medias/images/boutonLivreOuvert.png";
        
        
    }else{
         image.src = "medias/images/boutonLivreFerme.png";
    }
}