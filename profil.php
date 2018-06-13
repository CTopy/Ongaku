<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil du joueur</title>
    <meta name="description" content="Affichage du profil du joueur">
    <link rel="stylesheet" href="./css/styleProfil.css">
    <link rel="stylesheet" href="./css/styleGeneral.css">
    <link rel="stylesheet" href="./css/header.css">
    <script type="text/javascript" src="js/header.js"></script>

</head>

<body>
     <?php include("header.php"); ?>

    <main>
        <div class="profilPseudo">
            <h1>Profil</h1>
            <h2>pseudo</h2>
        </div>

        <div class="casesARemplir">

            <div class="changerPseudo">
                <label for="pseudo">Changer de pseudo</label>
                <input type="text" id="pseudo" name="nvPseudo">
            </div>

            <div class="mettrePhoto">
                <label for="boutonPhoto" >mettre une photo</label>
                <input type="file" id="boutonPhoto" >
            </div>

            <div class="changerMail">
                <label for="mail">changer de mail</label>
                <input type="email" id="mail" name="nvMail">
            </div>

            <div class="changerMotDePasse">
                <label for="mdp">changer de mot passe</label>
                <input type="password" id="mdp" name="nvMdp">
            </div>

            <div class="changerMailConf">
                <label class="confirmer" for="confMail">confirmer</label>
                <input type="email" id="confMail" name="confNvMail">
            </div>

            <div class="changerMotDePasseConf">
                <label class="confirmer" for="confMdp">confirmer</label>
                <input type="password" id="confMdp" name="confNvMdp">
            </div>

        </div>

        <div class="caseACocher">

            <div class="afficherLeMail">

                <h2>afficher le mail</h2>

                <div class="ouiNonMail">
                    <div>

                        <input type="radio" name="mail" value="yes" id="mailoui" />
                        <label for="mailoui">oui</label>
                    </div>
                    <div>
                        <input type="radio" name="mail" value="no" id="mailnon" />
                        <label for="mailnon">non</label>
                    </div>
                </div>

            </div>
            <div class="boutonVerif">
                <input type="image" src="./medias/images/boutonProfil.png" name="valider"/>
            </div>

        </div>

    </main>

</body>