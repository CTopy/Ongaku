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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <main>
        <div class="infosTitre">
            <div id="player">
                <span id="timer"></span>
                <iframe scrolling="no" frameborder="0" allowTransparency="true" src="https://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=false&width=300&height=300&color=007FEB&layout=dark&size=medium&type=tracks&id=109374136&app_id=1" width="500" height="500"></iframe>
            </div>
            <div>
                <span id="titre"><?php ?></span>
                <span id="auteur">Rusty Cage</span>
            </div>
        </div>

        <div>
            <h2>Paroles</h2>
            <div class="paroles">
                <p class="resize">We're the ___________, buddy and ____ everywhere, if you ___ a Gangstalker, then you better beware. We'll _______ you around in our broad red ____. We are the ___________ and we know ___ you are.</p>
                <input type="text" name="saisie" id="saisieUser" />
                <button type="button" id="envoyerReponse" onclick="buttonCode()">Envoyer</button>
            </div>
        </div>
    </main>

</body>

</html>