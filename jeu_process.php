<?php
// Cette page sert uniquement à faire fonctionner la page jeu.php

header("Content-type: text/html; charset=UTF-8");

//Connection à la base de données
require("param.inc.php");
$pdo = new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
$pdo->query("SET NAMES utf8");
$pdo->query("SET CHARACTER SET 'utf-8'");
    
//Cette fonction retourne un tableau qui contient un texte à trous
//ainsi qu'un tableau qui contient chaque mot caché
function cacherMots($phrase) {
    
    $tabMots = str_word_count($phrase, 1, 'àáâæçèéêëìíîïñòóôœùúûüýÿÀÁÂÆÇÈÉÊËÌÍÎÏÑÒÓÔŒÙÚÛÜÝŸ');  
    $nbMotsCaches = (1/3) * count($tabMots);
    $index = 0;
    
    foreach ($tabMots as $elt) {
        $alea = rand(0, 3);
        if ($alea == 1) {
            $motsCaches[$index] = $elt;
            $index++;
        }
    }
    
    foreach ($motsCaches as $elt) {
        $strReplace = "";
        for ($i = 0; $i < strlen($elt); $i++) {
            $strReplace = $strReplace."_";
        }
        
        $phrase = preg_replace('/((?:(^|[\s,.]))'.$elt.'(?:$|[\s,.]))/', " ".$strReplace." ", $phrase);
        // Banou and S3B4S, the best \o/
        
    }
    
    return array(
        "motsCaches" => $motsCaches,
        "phrase" => $phrase
    );
}

//
//SI L'UTILISATEUR A ENVOYE DES DONNEES ($_POST n'est pas null)
//
if($_POST != null) {
    
    //Récupérer les données envoyées par Javascript
    $saisieUser = strtolower($_POST['saisieUser']); //Saisie utilisateur
    $idParoles = $_POST['IdParoles']; //Id de la phrase affichée
    $phrase = strtolower($_POST['phrase']); //Phrase à trous à partir de laquelle seront calculés les mots manquants
    
    //Eclater sa réponse en un tableau de mots
    $motsUser = str_word_count($saisieUser, 1, 'àáâæçèéêëìíîïñòóôœùúûüýÿÀÁÂÆÇÈÉÊËÌÍÎÏÑÒÓÔŒÙÚÛÜÝŸ');
    
    //PHP récupère les paroles complètes
    $requete = "SELECT Paroles FROM PAROLES WHERE IdParoles = '".addslashes($idParoles)."'";
    $paroles = $pdo->query($requete);
    $paroles = $paroles->fetch(PDO::FETCH_ASSOC);
    $paroles = $paroles['Paroles'];
    
    $tabParoles = str_word_count($paroles, 1, 'àáâæçèéêëìíîïñòóôœùúûüýÿÀÁÂÆÇÈÉÊËÌÍÎÏÑÒÓÔŒÙÚÛÜÝŸ');
    $tabPhrase = str_word_count($phrase, 1, 'àáâæçèéêëìíîïñòóôœùúûüýÿÀÁÂÆÇÈÉÊËÌÍÎÏÑÒÓÔŒÙÚÛÜÝŸ');
    
    foreach ($tabParoles as $eltParoles) {
        foreach($tabPhrase as $eltPhrase) {
            if ($eltParoles == $eltPhrase) {
                foreach (array_search($tabParoles, $elt) as $eltOSEF) {
                unset($tabParoles[$eltOSEF]);
                }
            }
        }
    }
    
    $strTest = "";
    foreach ($tabParoles as $elt) {
        $strTest = $elt." ";
    }
    
    echo($strTest);
    //
    //SINON
    //
} else {
//Choisir une musique au hasard selon un critère
//A AMELIORER : Récupérer le critère de la page de sélection
//Ajouter "WHERE" pour critère
$requete = "SELECT IdMusique, NomMusique, NomAuteur FROM MUSIQUES ORDER BY RAND() LIMIT 1";
$resultats = $pdo->query($requete);
$resultats = $resultats->fetch(PDO::FETCH_ASSOC);

//Sélectionner des paroles au hasard parmis celles disponibles pour la chanson en cours
$requete = "SELECT Paroles, IdParoles FROM PAROLES WHERE IdMusique = '".addslashes($resultats["IdMusique"])."' ORDER BY RAND() LIMIT 1";
$paroles = $pdo->query($requete);
$paroles = $paroles->fetch(PDO::FETCH_ASSOC);

$arrayText = cacherMots($paroles["Paroles"]);
$string = "";
    
    //Réunir les mots cachés en une string pour l'envoi par requête HTTP
foreach($arrayText['motsCaches'] as $elt) {
    $string = $string.$elt;
    $string = $string."/";
}

    //Echo le résultat sous forme d'une string qui sera déchiffrée par le Javascript
echo($resultats['IdMusique'].
                 ";".$resultats['NomMusique'].
                 ";".$resultats['NomAuteur'].
                 ";".$string.//Les mots cachés
                 ";".$arrayText['phrase'].
                 ";".$paroles['IdParoles']);
}

$pdo = null;