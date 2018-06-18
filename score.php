<?php
session_start();
if (empty($_POST)) {
    header("Location: index.php");}

if (!empty($_SESSION['idJoueur'])) {
    
    //Connexion à la base de données
    require("param.inc.php");
    $pdo = new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
    $pdo->query("SET NAMES utf8");
    $pdo->query("SET CHARACTER SET 'utf-8'");
    
    //Récupération du score de l'utilisateur
    $requete = "SELECT ScoreJoueur FROM JOUEURS WHERE IdJoueur = '".$_SESSION['idJoueur']."'";
    $resultat = $pdo->query($requete);
    $resultat = $resultat->fetch(PDO::FETCH_ASSOC);
    
    //Ajout du score de l'utilisateur au score de la partie
    $newscore = (int)$resultat['ScoreJoueur'] + (int)$_POST['score'];
    $requete = "UPDATE JOUEURS SET ScoreJoueur = ".$newscore." WHERE IdJoueur = '".$_SESSION['idJoueur']."'";
    $resultat = $pdo->query($requete);
    
    $requete = "SELECT ScoreJoueur FROM JOUEURS WHERE IdJoueur = '".$_SESSION['idJoueur']."'";
    $resultat = $pdo->query($requete);
    $resultat = $resultat->fetch(PDO::FETCH_ASSOC);
    
    echo($resultat['ScoreJoueur']);
    
    $pdo = null;
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page de resultat</title>
        <meta name="description" content="Affichage des scores après la fin de la partie">
        <link rel="stylesheet" href="./css/styleScore.css">
        <link rel="stylesheet" href="./css/styleGeneral.css">
        <link rel="stylesheet" href="./css/jquery-ui.css">

    </head>

    <body>

        <header>

            <nav>

            </nav>

        </header>

        <main>

            <h1>Score</h1>




            <section class="ombreBarre">


                <div class="numero1">

                    <div>
                        <img class="logoJoueur" src="./medias/images/logoFeminin.png" alt="Logo joueur basique">
                    </div>



                    <div id="barre"></div>

                    <p class="scoreJoueur">
                        <?php echo($_POST['score']); ?>
                    </p>


                </div>



            </section>

            <div class="rejouerQuitter">

                <button id="rejouer">Rejouer</button>
                <button id="quitter">Quitter</button>

            </div>

        </main>


        <footer>
        </footer>

        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/barreScore.js"></script>

    </body>

    </html>