(function () {
    "use strict";
document.addEventListener("DOMContentLoaded",initialiser);
    
    
 function initialiser(evt){
     var menuDeroulant = document.getElementById("iconeDeroulant");
     menuDeroulant.addEventListener("click", cliquer); 

}   
    
    
function cliquer(evt){
    var imageClique = this;
    document.getElementsById("menuDeroulant").classList.add("apparaitre") ;
    /*this.removeEventListener("click", cliquer); */
   
    
    
}
    
} ())