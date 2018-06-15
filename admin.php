<?php

header("Content-type: text/html; charset=UTF-8");

//Connection à la base de données
require("param.inc.php");
$pdo = new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
$pdo->query("SET NAMES utf8");
$pdo->query("SET CHARACTER SET 'utf-8'");
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta name="robots" content="noindex, nofollow">
        <title>Ongaku - Admin</title>
        <meta charset="utf-8">
        <meta name="description" content="Interface administrateur">
        <link rel="stylesheet" href="css/styleGeneral.css" />
    </head>

    <body>
        <style>
            [type="text"] {
                font-family : 'Courier New' !important;
                font-size : 12pt !important;
            }
        </style>
        <main>
            <h1>Ongaku - Interface administrateur</h1>
            <h2>Ajouter une musique et des paroles</h2>
            
            <form method="post" action="traitementadmin.php">
                
                <fieldset>
                    <legend>Ajouter une musique</legend>
                    
                    <label>Id de la musique sur Deezer</label>
                    <input required type="text" name="IdMusique" />

                    <label>Langue de la musique</label>
                    <select required name="IdLangue">
                        
                        <?php
                $requete = "SELECT IdLangue, LibelleLangue FROM LANGUES";
                $query = $pdo->query($requete);
                do {
                    $ligne = $query->fetch(PDO::FETCH_ASSOC);
                    ?>
                            <option value="<?php $ligne['IdLangue']; ?>">
                                <?php echo($ligne['LibelleLangue']) ?>
                            </option>
                        
                            <?php
                } while ($ligne != false);
                ?>
                    </select>
                    
                    <br/>
                    
                    <label>Styles de la musique</label>
                    <select required name="IdStyle1">
                        
                        <?php
                $requete = "SELECT IdStyle, LibelleStyle FROM STYLES";
                $query = $pdo->query($requete);
                do {
                    $ligne = $query->fetch(PDO::FETCH_ASSOC);
                    ?>
                        
                            <option value="<?php $ligne['IdStyle']; ?>">
                                <?php echo($ligne['LibelleStyle']) ?>
                            </option>
                        
                            <?php
                } while ($ligne != false);
                ?>
                    </select>
                    
                    <button id="addstyle" type="button">Ajouter un autre style</button>
                    
                </fieldset>
                
                <fieldset>
                    <label>Paroles 1</label>
                    <textarea required name="paroles1" rows="5" cols="50"></textarea>
                    <button id="addparoles" type="button">Ajouter un deuxième extrait de paroles</button>
                </fieldset>
                
                <button type="submit">Valider</button>
            </form>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/admin.js"></script>
    </body>

    </html>