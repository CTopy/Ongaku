<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Ongaku - Créer un compte</title>
        <meta name="description" content="Creer un compte sur Ongaku pour pouvoir profiter de toutes les fonctionnalitées du jeu !" />
        <link rel="stylesheet" href="css/FormInscription.css" type="text/css" />
        <link rel="stylesheet" href="css/styleGeneral.css" />
    </head>

    
<?php
session_start();

    require("param.inc.php");
    $pdo=new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
    $pdo->query("SET NAMES utf8");
    $pdo->query("SET CHARACTER SET 'utf8'");
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
    $mdp_erreur = NULL;
    $email_erreur1 = NULL;
    $email_erreur2 = NULL;
    $email_erreur3 = NULL;
    $avatar_erreur = NULL;
    $avatar_erreur1 = NULL;
    $avatar_erreur2 = NULL;
    $avatar_erreur3 = NULL;

    //Récuperaton variables
    $i = 0;
    $pseudo=$_POST["pseudo"];
    $email=$_POST["email"];
    $confirmemail = $_POST['confirmeremail'];
    $sexe=$_POST["sexe"];
    $mdp= sha1($_POST["mdp"]);
    $confirmmdp = sha1($_POST['confirmermdp']);
    //$avatar=$_POST["avatar"];

    //Vérification du pseudo
    $query=$pdo->prepare('SELECT COUNT(*) FROM JOUEURS WHERE PseudoJoueur =:pseudo');
    $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
    $query->execute();
    $pseudo_used=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    if(!$pseudo_used)
    {
        $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
        $i++;
    }

    if (strlen($pseudo) < 3 || strlen($pseudo) > 15)
    {
        $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
        $i++;
    }

    //Vérification du mdp
    if ($mdp != $confirmmdp || empty($confirmmdp) || empty($mdp))
    {
        $mdp_erreur = "Votre mot de passe et votre confirmation sont différents, ou sont vides";
        $i++;
    }


    //Adresse email utilisée
    $query=$pdo->prepare('SELECT COUNT(*) FROM JOUEURS WHERE eMailJoueur =:mail');
    $query->bindValue(':mail',$email, PDO::PARAM_STR);
    $query->execute();
    $mail_used=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();

    if(!$mail_used)
    {
        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
    }

    //Vérification de la forme
    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
    {
        $email_erreur2 = "Le format de votre adresse E-Mail n'est pas valide";
        $i++;
    }

    //Vérification de l'adresse email
    if ($email != $confirmemail || empty($confirmemail) || empty($email))
    {
        $email_erreur3 = "Votre adresse email et votre confirmation sont diffèrente, ou sont vides";
        $i++;
    }

    //Vérification de l'avatar :
    if (!empty($_FILES['avatar']['size']))
    {
        $maxsize = 10024; 
        $maxwidth = 100; 
        $maxheight = 100;
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); 

        if ($_FILES['avatar']['error'] > 0)
        {
                $avatar_erreur = "Erreur lors du transfert de l'avatar :/ ";
        }
        if ($_FILES['avatar']['size'] > $maxsize)
        {
                $i++;
                $avatar_erreur1 = "Le fichier est trop gros : (<strong>".$_FILES['avatar']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        $image_sizes = getimagesize($_FILES['avatar']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
                $i++;
                $avatar_erreur2 = "Image trop large ou trop longue : 
                (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
        }

        $extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur3 = "Extension de l'avatar incorrecte";
        }

       
    }
?>
    <body>
<?php
    if ($i==0){
?>
    <main>
<?php
        echo'<h1 class="titre">Inscription terminée !</h1>';
?>
    <div class="error">
<?php
        echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit sur le site !</p>
        <p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p>';
?>
        </div>
<?php
       
       $nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):''; 

        $query=$pdo->prepare('INSERT INTO JOUEURS (PseudoJoueur, eMailJoueur, MdpJoueur, SexeJoueur, URLAvatarJoueur)
        VALUES (:pseudo, :email, :mdp, :sexe, :nomavatar);');
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':mdp', $mdp, PDO::PARAM_INT);
        $query->bindValue(':sexe', $sexe, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':nomavatar', $nomavatar, PDO::PARAM_STR);
        $query->execute();

    //variables de sessions
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['email'] = $email;
        $_SESSION['idJoueur'] = $pdo->lastInsertId(); ;
        $query->CloseCursor();

        
        
    }else {
?>
<?php
        echo'<h1 class="titre">OUPS !</h1>';
?>
        <div class="error">
<?php
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l\'incription...</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
        echo'<p>'.$email_erreur2.'</p>';
        echo'<p>'.$email_erreur3.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo'<p>'.$avatar_erreur.'</p>';
        echo'<p>'.$avatar_erreur1.'</p>';
        echo'<p>'.$avatar_erreur2.'</p>';
        echo'<p>'.$avatar_erreur3.'</p>';

        echo'<p>Cliquez <a href="./CreerUnCompte.php">ici</a> pour recommencer</p>';
?>
        </div>
        </main>
<?php        
    }
?>
</body>
</html>