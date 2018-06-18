<?php

header("Content-type: text/html; charset=UTF-8");

/*if ($_SESSION['idJoueur'] == false) {
     header("Location: index.php");
 }*/

//Connection à la base de données
require("param.inc.php");
$pdo = new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
$pdo->query("SET NAMES utf8");
$pdo->query("SET CHARACTER SET 'utf-8'");

/*  EMPECHER LES NON ADMINS DE SE CONNECTER A LA PAGE
$requete = "SELECT IdAdministrateur FROM ADMINISTRATEURS WHERE IdJoueur = ".$_SESSION['idJoueur'];
$statement = $pdo->query($requete);
$resultat = $statement->fetch(PDO::FETCH_ASSOC);

if ($resultat == false) {
    header("Location: index.php");
}*/

if (!empty($_POST)) {
    
    // L'utilisateur a modifié les données d'une musique
    if ($_POST['action'] == "modify") {
        $i = 0;
        $requete = "UPDATE MUSIQUES SET ";
        $param = array();
        $requeteArray = array();
        
        if (!empty($_POST['IdMusique'])) {
            $requeteArray[] ="IdMusique=?, ";
            $param[] = $_POST['IdMusique'];
        }
        if (!empty($_POST['NomMusique'])) {
            $requeteArray[] ="NomMusique=?, ";
            $param[] = $_POST['NomMusique'];
        }
        if (!empty($_POST['NomAuteur'])) {
            $requeteArray[] ="NomAuteur=?, ";
            $param[] = $_POST['NomAuteur'];
        }
        
        if ($_POST['IdLangue'] != "false") {
            $requeteArray[] ="IdLangue=?, ";
            $param[] = $_POST['IdLangue'];
        }
        
        foreach ($requeteArray as $elt) {
            $requete = $requete.$elt;
        }
        $requete = substr($requete, 0, -2);
        $requete = $requete." WHERE MUSIQUES.IdMusique = ?;";
        $param[] = $_POST['oldid'];
        
        $statement = $pdo->prepare($requete);  
        $statement->execute($param);
        echo(var_dump($statement)."<br>");
        echo(var_dump($param));
        echo($requete."<br>");
        echo("<br>");
        echo(var_dump($_POST));
    }
}

$pdo = null;
?>