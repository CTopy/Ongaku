
document.addEventListener("DOMContentLoaded",initialiser);
    
function initialiser(evt){
     var menuDeroulant = document.getElementById("iconeMenu");
     menuDeroulant.addEventListener("onclick", cliquer); 

}   
    
    
function cliquer(evt){
    document.getElementsById("menuDeroulant").classList.toggle("apparaitre") ;
    /*this.removeEventListener("click", cliquer); */
    
}