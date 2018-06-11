<?php

session_start();

$_SESSION['idJoueur']="";

if (!empty($_SESSION['idJoueur'])){

?>

  <header>
        
        <div>
        
        <img id="iconeMenu" src="medias/images/deroulant.png" alt="Menu déroulant" />
        <nav> 
            <ul class="menuDeroulant" >
                <li><a href="">Se deconnecter</a></li>

                <li><a href="accueil.html">Accueil</a></li>

                <li><a href="choix.html">Jouer en solo</a></li>
            </ul>
        </nav>
        
        <div class="reseaux">
            
            <a href="https://twitter.com/Ongaku76824917"> <img class="twitter" src="medias/images/twitter.png" alt="twitter" /></a>
            
            <a href="https://www.facebook.com/OngakuMMi/?modal=admin_todo_tour"> <img class="facebook" src="medias/images/facebook.png" alt="facebook" /></a>
            
        </div>
        </div>

        <h1><a href="accueil.html" >ONGAKU</a></h1>

        <div>
           <!-- <a href="chat.html"> <img src="medias/images/logoChat.png" alt="Icône du chat" /></a> -->

            <a href="profil.html"> <img class="iconeMembre" src="medias/images/logoFeminin.png" alt="Icône du profil" /></a>
        </div>

    </header>



<?php
} else {
?>

<header>
            
            <div>
            
               <img id="iconeMenu" src="medias/images/deroulant.png" alt="Menu déroulant"/>
                <nav>
                        <ul class="menuDeroulant">
                            <li><a href="creerCompte.html">creer un compte</a></li>
                            
                            <li><a href="accueil.html">Accueil</a></li>
                            
                            <li><a href="choix.html">Jouer en solo</a></li>
                        </ul>
              </nav>
            <div class="reseaux">
            
            <a href="https://twitter.com/Ongaku76824917"> <img class="twitter" src="medias/images/twitter.png" alt="twitter" /></a>
            
            <a href="https://www.facebook.com/OngakuMMi/?modal=admin_todo_tour"> <img class="facebook" src="medias/images/facebook.png" alt="facebook" /></a>
            
        </div>
                </div>
            
                  <h1><a href="accueil.html" >ONGAKU</a></h1>

            
            <div>
                <a href="profil.html" > <img class="iconeMembre" src="medias/images/logoInvite.png" alt ="Icône du profil"/></a>
            </div>
    
        </header>




<?php
}
?>






