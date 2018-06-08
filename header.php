<?php

session_start();

if (isset($_SESSION['idJoueur'])){

?>

 <header class="header1">

        
            <img id="iconeMenu" src="medias/images/deroulant.png" alt="Menu déroulant" />
        <nav>
            <ul class="menuDeroulant" >
                <li><a href="">Se deconnecter</a></li>

                <li><a href="accueil.html">Accueil</a></li>

                <li><a href="choix.html">Jouer en solo</a></li>
            </ul>
        </nav>

        <h1><a href="accueil.html" >ONGAKU</a></h1>

        <div>
            <a href="chat.html"> <img src="medias/images/logoChat.png" alt="Icône du chat" /></a>

            <a href="profil.html"> <img class="iconeMembre" src="medias/images/logoFeminin.png" alt="Icône du profil" /></a>
        </div>

    </header>



<?php
} else {
?>

<header class="header1">
            
               <img id="iconeMenu" src="medias/images/deroulant.png" alt="Menu déroulant"/>
                <nav>
                        <ul class="menuDeroulant">
                            <li><a href="creerCompte.html">creer un compte</a></li>
                            
                            <li><a href="accueil.html">Accueil</a></li>
                            
                            <li><a href="choix.html">Jouer en solo</a></li>
                        </ul>
              </nav>
            
                  <h1><a href="accueil.html" >ONGAKU</a></h1>

            
            <div>
                <a href="profil.html" > <img class="iconeMembre" src="medias/images/logoInvite.png" alt ="Icône du profil"/></a>
            </div>
    
        </header>




<?php
}
?>






