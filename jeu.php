<?php
header("Content-type: text/html; charset=UTF-8");
session_start();

unset($_SESSION['musiques']);
$_SESSION['musiques'] = array();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Ongaku - Jouer !</title>
    <meta name="robots" content="noindex">
    <meta charset="utf-8" />
    <meta type="description" content="" />

    <link rel="stylesheet" href="css/styleGeneral.css" />
    <link rel="stylesheet" href="css/jeu.css" />
</head>

<body>
    <main>
        <div class="infosTitre">
            <div id="player">
                <span id="timer"></span>
                <audio autoplay type="audio/mpeg"></audio>
            </div>
            <div>
                <span id="titre"></span>
                <span id="auteur"></span>
            </div>
        </div>

        <div>
            <h2>Paroles</h2>
            <div class="paroles">
                <p class="resize" id="paroles">
                </p>
                <form id="formulaire">
                    <input autocomplete="off" type="text" name="saisie" id="saisieUser" />
                    <button type="button" id="envoyerReponse" onclick="return false">Envoyer</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jeu.js"></script>

</body>

</html>