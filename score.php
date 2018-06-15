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

                <p class="scoreJoueur" data-score="8">XXX</p>


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