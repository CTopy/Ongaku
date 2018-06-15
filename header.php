<?php

session_start();



if (!empty($_SESSION['idJoueur'])){

?>

  <header>
        
        <div>
        
        <img id="iconeMenu" src="medias/images/deroulant.png" alt="Menu déroulant" />
        <nav> 
            <ul class="menuDeroulant" >
                <li><a href="deconnexion.php">Se deconnecter</a></li>

                <li><a href="index.php">Accueil</a></li>

                <li><a href="jeu.php">Jouer en solo</a></li>
                
                <li><a href="aPropos.php">A propos</a></li>
            </ul>
        </nav>
        
        <div class="reseaux">
            
            <a href="https://twitter.com/Ongaku76824917"> <img class="twitter" src="medias/images/twitter.png" alt="twitter" /></a>
            
            <a href="https://www.facebook.com/OngakuMMi/?modal=admin_todo_tour"> <img class="facebook" src="medias/images/facebook.png" alt="facebook" /></a>
            
        </div>
        </div>

        <p><a href="index.php" >ONGAKU</a></p>

        <div>
           <!-- <a href="chat.html"> <img src="medias/images/logoChat.png" alt="Icône du chat" /></a> -->
             <img id="iconeRegle" src="medias/images/boutonLivreFerme.png" alt="Règles">
                <section id="nav2">
                    <ul class="menuDeroulant">
                        <li>Vous pouvez remplir les mots de la musique pendant 45 secondes (30 secondes de musique et 15 secondes supplémentaires pour écrire)
                        <li>Le seul moyen pour compléter les mots manquant c'est de les écrire dans la barre de réponse</li>
                        <li>Vous pouvez mettre tous les mots en même temps dans la barre de réponse même s'ils ne se suivent pas dans les paroles</li>
                        <li>Une partie est composée de 10 chansons différentes</li>
                    </ul>
                </section>

            <a href="profil.php"> <img class="iconeMembre" src="medias/images/logoFeminin.png" alt="Icône du profil" /></a>
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
                            
                             <li><a href="aPropos.php">A propos</a></li>
                        </ul>
              </nav>
            <div class="reseaux">
            
            <a href="https://twitter.com/Ongaku76824917"> <img class="twitter" src="medias/images/twitter.png" alt="twitter" /></a>
            
            <a href="https://www.facebook.com/OngakuMMi/?modal=admin_todo_tour"> <img class="facebook" src="medias/images/facebook.png" alt="facebook" /></a>
            
        </div>
                </div>
            
                  <p><a href="index.php" >ONGAKU</a></p>

            <div>
                <img id="iconeRegle" src="medias/images/boutonLivreFerme.png" alt="Règles">
                <section id="nav2">
                    <ul class="menuDeroulant">
                        <li>Vous pouvez remplir les mots de la musique pendant 45 secondes (30 secondes de musique et 15 secondes supplémentaires pour écrire)
                        <li>Le seul moyen pour compléter les mots manquant c'est de les écrire dans la barre de réponse</li>
                        <li>Vous pouvez mettre tous les mots en même temps dans la barre de réponse même s'ils ne se suivent pas dans les paroles</li>
                        <li>Une partie est composée de 10 chansons différentes</li>
                    </ul>
                </section>
                <a href="seConnecter.php" > <img class="iconeMembre" src="medias/images/logoInvite.png" alt ="Icône du profil"/></a>
            </div>
    
        </header>




<?php
}
?>






