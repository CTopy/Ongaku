<?php
header("Content-type: text/html; charset=UTF-8");

//Connection à la base de données
require("param.inc.php");
$pdo = new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
$pdo->query("SET NAMES utf8");
$pdo->query("SET CHARACTER SET 'utf-8'");
?>

    <!DOCTYPE HTML>

    <html lang="fr">

    <head>
        <title>Ongaku - Choix</title>
        <meta charset="utf-8">
        <meta name="description" content="Choisir son Jeu, son style de musique et son language ">
        <link rel="stylesheet" href="css/Choix.css" type="text/css" />
        <link rel="stylesheet" href="css/styleGeneral.css" />
    </head>

    <body>
        <main>
            <form method="post">
                <fieldset id="jeu">
                    <legend>JEU</legend>
                    <input id="classique" type="radio" name="jeu" value="classique" />
                    <label for="classique">CLASSIQUE</label>

                    <input id="chrono" type="radio" name="jeu" value="classique" />
                    <label for="chrono">CHRONO</label>
                </fieldset>

                <fieldset id="style">
                    <legend>STYLES</legend>
                    <?php
          
                    //Demander la liste des styles à la base de donnée
            $requete = "SELECT IdStyle, LibelleStyle FROM STYLES"
            $resultats = $pdo->query($requete);
            $resultats = $paroles->fetch(PDO::FETCH_ASSOC);  
                    
                    //Les afficher
                    foreach ($resultats as $elt) {
                        ?>
                    <input id="<?php echo($elt['IdStyle']) ?>" type="radio" name="style" value="<?php echo($elt['IdStyle']) ?>" />
                    <label for="<?php echo($elt['IdStyle']) ?>"><?php echo($elt['LibelleStyle']) ?></label>
                    
                    <?php
                    }
                    ?>

                </fieldset>

                <fieldset id="langue">
                    <legend>LANGUE</legend>
                    
                    <?php
          
                    //Demander la liste des styles à la base de donnée
            $requete = "SELECT IdStyle, LibelleStyle FROM LANGUES"
            $resultats = $pdo->query($requete);
            $resultats = $paroles->fetch(PDO::FETCH_ASSOC);  
                    
                    //Les afficher
                    foreach ($resultats as $elt) {
                        ?>
                    <input id="<?php echo($elt['IdLangue']) ?>" type="radio" name="style" value="<?php echo($elt['IdLangue']) ?>" />
                    <label for="<?php echo($elt['IdLangue']) ?>"><?php echo($elt['LibelleLangue']) ?></label>
                    
                    <?php
                    }
                    pdo = null;
                    ?>
                </fieldset>

                <input type="image" src="medias/images/Elements/boutonChoix.png" height="300" width="300" alt="Valider" />

            </form>

        </main>
    </body>

    </html>