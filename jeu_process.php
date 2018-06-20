<?php
// Cette page sert uniquement à faire fonctionner la page jeu.php

header("Content-type: text/html; charset=UTF-8");
session_start();

$caracteresSpeciaux = 'àáâæçèéêëìíîïñòóôœùúûüýÿÀÁÂÆÇÈÉÊËÌÍÎÏÑÒÓÔŒÙÚÛÜÝŸ';        // Contient tous les caractères spéciaux, utile pour le str_word_count

//Connection à la base de données
require("param.inc.php");
$pdo = new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
$pdo->query("SET NAMES utf8");
$pdo->query("SET CHARACTER SET 'utf-8'");

//Cette fonction retourne un tableau qui contient un texte à trous
//ainsi qu'un tableau qui contient chaque mot caché
function cacherMots($phrase) {

    $caracteresSpeciaux = 'àáâæçèéêëìíîïñòóôœùúûüýÿÀÁÂÆÇÈÉÊËÌÍÎÏÑÒÓÔŒÙÚÛÜÝŸ';        // Contient tous les caractères spéciaux, utile pour le str_word_count

    $tabMots = str_word_count(strtolower($phrase), 1, $caracteresSpeciaux);  
    $nbMotsCaches = (1/3) * count($tabMots);
    $index = 0;

    do {    
        foreach ($tabMots as $elt) {
            $alea = rand(0, 6);
            if ($alea == 1) {
                $motsCaches[$index] = $elt;
                $index++;
            }
        }
    } while (!isset($motsCaches));

    foreach ($motsCaches as $elt) {
        $strReplace = "";
        for ($i = 0; $i < strlen($elt); $i++) {
            $strReplace = $strReplace."_";
        }

        $phrase = preg_replace('/(?i)((?:(^|[\s,.]))'.$elt.'(?:$|[\s,.]))/', " ".$strReplace." ", $phrase);
        // Thanks to Banou and S3B4S, the bestest \o/

    }

    return array(
        "motsCaches" => $motsCaches,
        "phrase" => $phrase
    );
}

//Cette fonction permet de cacher les mots de $tabMots dans la $phrase,
//elle permet le traitement de la réponse du joueur
function remplacerMots($phrase, $tabMots) {

    $caracteresSpeciaux = 'àáâæçèéêëìíîïñòóôœùúûüýÿÀÁÂÆÇÈÉÊËÌÍÎÏÑÒÓÔŒÙÚÛÜÝŸ';        // Contient tous les caractères spéciaux, utile pour le str_word_count

    foreach ($tabMots as $elt) {
        $strReplace = "";
        for ($i = 0; $i < strlen($elt); $i++) {
            $strReplace = $strReplace."_";
        }

        $phrase = preg_replace('/(?i)((?:(^|[\s,.]))'.$elt.'(?:$|[\s,.]))/', " ".$strReplace." ", $phrase);
        // Thanks Banou and S3B4S, the bestest \o/²

    }

    return $phrase;
}

//
//SI L'UTILISATEUR A ENVOYE DES DONNEES ($_POST n'est pas null)
//
if(isset($_POST['saisieUser'])) {

    //Récupérer les données envoyées par Javascript
    $saisieUser = strtolower($_POST['saisieUser']); //Saisie utilisateur
    $idParoles = $_POST['idParoles']; //Id de la phrase affichée

    //Eclater sa réponse en un tableau de mots
    $motsUser = str_word_count($saisieUser, 1, $caracteresSpeciaux);

    //PHP récupère les paroles complètes
    $requete = "SELECT Paroles FROM PAROLES WHERE IdParoles = '".addslashes($idParoles)."'";
    $paroles = $pdo->query($requete);
    $paroles = $paroles->fetch(PDO::FETCH_ASSOC);
    $paroles = $paroles['Paroles'];

    //Récupérer la saisie sous forme de tableau
    $tabSaisie = str_word_count($saisieUser, 1, $caracteresSpeciaux);

    $motsCaches = array_diff($_SESSION['motsCaches'], $tabSaisie);

    if (!empty($motsCaches) && $saisieUser != "win") {
        //            Il reste encore des mots à trouver 
        echo("false;".remplacerMots($paroles, $motsCaches).";");
        $_SESSION['motsCaches'] = $motsCaches;
    } else {
        //        AH OUAIS OUAIS OUAIS OUAIS OUAIS, C'EST GAGNE, C'EST OUI
        echo("true;".remplacerMots($paroles, $motsCaches).";");
    }

    if ($saisieUser == "win") {
        echo("true;Lol;");
    }

    //
    //SINON
    //
} else {
    //Choisir une musique au hasard selon un critère
    //A AMELIORER : Récupérer le critère de la page de sélection
    //Ajouter "WHERE" pour critère
    // Faire en sorte de ne pas pouvoir avoir la même musique 2 fois

    //Récupérer une musique dans la BDD 
    if (!empty($_SESSION['musiques'])) {
        $requete = "SELECT IdMusique, NomMusique, NomAuteur FROM MUSIQUES WHERE ";
        foreach ($_SESSION['musiques'] as $elt) {
            $requete = $requete."IdMusique <> '".addslashes($elt)."' AND ";
        }
        $requete = $requete."1=1 ORDER BY RAND() LIMIT 1";
        $requeteAfficher = $requete;
        
    } else {
        $requete = "SELECT IdMusique, NomMusique, NomAuteur FROM MUSIQUES ORDER BY RAND() LIMIT 1";
    }
    $resultats = $pdo->query($requete);
    $resultats = $resultats->fetch(PDO::FETCH_ASSOC);
    $idmusique = $resultats['IdMusique'];
    
    // Ajouter la musique aux musiques déjà passées
    $_SESSION['musiques'][] = $idmusique;

    //
    //Récupérer les données Deezer
    //
    $ctx = stream_context_create(array(
        'http' => array(
            'timeout' => 1
        )
    )); 
    $response = @file_get_contents("http://www.google.fr",0,$ctx);
    if ($response === false)
        $opts = array(
        "http" => array(
            "proxy" => "tcp://proxy.univ-lemans.fr:3128" ,
            "request_fulluri" => true
        ),
    );
    else
        $opts = array(
        "http" => array(
            "request_fulluri" => true
        ),
    );;
    $context = stream_context_create($opts);
    $url = "https://api.deezer.com/track/".$idmusique;
    $json = file_get_contents($url,false,$context) ;
    $resultatDz = json_decode($json,true) ;
    //
    //Fin de la récupération des données Deezer
    //

    //Sélectionner des paroles au hasard parmis celles disponibles pour la chanson en cours
    $requete = "SELECT Paroles, IdParoles FROM PAROLES WHERE IdMusique = '".addslashes($idmusique)."' ORDER BY RAND() LIMIT 1";
    $paroles = $pdo->query($requete);
    $paroles = $paroles->fetch(PDO::FETCH_ASSOC);

    $arrayText = cacherMots($paroles["Paroles"]);

    $_SESSION['motsCaches'] = $arrayText['motsCaches'];
    //Echo le résultat sous forme d'une string qui sera déchiffrée par le Javascript
    echo($resultatDz['preview'].
         ";".$resultats['NomMusique'].
         ";".$resultats['NomAuteur'].
         ";Rien a voir ici".//Rien du tout
         ";".$arrayText['phrase'].
         ";".$paroles['IdParoles']);
}

$pdo = null;