<!DOCTYPE html>
<html>

    <head>
        <title>Ongaku - Jouer !</title>
        <meta name="robots" content="noindex">
        <meta charset="utf-8" />
        <meta type="description" content="" />

        <link rel="stylesheet" href="css/styleGeneral.css" />
        <link rel="stylesheet" href="css/jeu.css" />
        <script src="js/jeu.js"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    </head>

    <body>
        <main>
            <div class="infosTitre">
                <div id="player">
                    <span id="timer"></span>
                    <iframe scrolling="no" frameborder="0" allowTransparency="true" src="" width="500" height="500"></iframe>
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
                    <form id="formulaire" onsubmit="return false;">
                        <input autocomplete="off" type="text" name="saisie" id="saisieUser" />
                        <button type="button" id="envoyerReponse" onclick="return buttonCode();">Envoyer</button>
                    </form>
                </div>
            </div>
        </main>

    </body>

    </html>