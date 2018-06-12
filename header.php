<?php

session_start();



if (!empty($_SESSION['idJoueur'])){

?>

  <header>
        
        <div>
        
        <img id="iconeMenu" src="medias/images/deroulant.png" alt="Menu déroulant" />
        <nav> 
            <ul class="menuDeroulant" >
                <li><a href="seConnecter.php">Se deconnecter</a></li>

                <li><a href="index.php">Accueil</a></li>

                <li><a href="jeu.php">Jouer en solo</a></li>
            </ul>
        </nav>
        
        <div class="reseaux">
            
            <a href="https://twitter.com/Ongaku76824917"> <img class="twitter" src="medias/images/twitter.png" alt="twitter" /></a>
            
            <a href="https://www.facebook.com/OngakuMMi/?modal=admin_todo_tour"> <img class="facebook" src="medias/images/facebook.png" alt="facebook" /></a>
            
        </div>
        </div>

        <h1><a href="index.php" >ONGAKU</a></h1>

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
                            <li><a href="CreerUnCompte.php">creer un compte</a></li>
                            
                            <li><a href="index.php">Accueil</a></li>
                            
                            <li><a href="jeu.php">Jouer en solo</a></li>
                        </ul>
              </nav>
            <div class="reseaux">
            
            <a href="https://twitter.com/Ongaku76824917"> <img class="twitter" src="medias/images/twitter.png" alt="twitter" /></a>
            
            <a href="https://www.facebook.com/OngakuMMi/?modal=admin_todo_tour"> <img class="facebook" src="medias/images/facebook.png" alt="facebook" /></a>
            
        </div>
                </div>
            
                  <h1><a href="index.php" >ONGAKU</a></h1>

            
            <div>
                <a href="seConnecter.php" > <img class="iconeMembre" src="medias/images/logoInvite.png" alt ="Icône du profil"/></a>
            </div>
    
        </header>




<?php
}
?>






