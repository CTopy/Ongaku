<?php 

  ini_set('session.use_trans_sid', true);
  ini_set('session.use_cookies', true);        
  ini_set('session.use_only_cookies', false);
  session_start();

?>

<!DOCTYPE HTML>

<html lang="fr">

<head>
    <title>Ongaku - Se connecter</title>
    <meta charset="utf-8" />
    <meta name="description" content="Se connecter à Ongaku ! pour pouvoir profiter de tous les avantages membres !" />
    <link rel="stylesheet" href="css/seConnecter.css" type="text/css" />
    <link rel="stylesheet" href="css/styleGeneral.css" />
</head>

<body>
    <main>
        <h1>SE CONNECTER</h1>
        <form action="verifConnexion.php" method="post">
            <fieldset>
                <input type="text" name="email" placeholder="EMAIL" />
                <input type="password" name="motDePasse" placeholder="MOT DE PASSE" />
                <input type="submit" name="envoi" value="verifier" class="btnValider">
            </fieldset>
        </form>
        <a href="">Mot de passe oublié ?</a>
    </main>
</body>

</html>