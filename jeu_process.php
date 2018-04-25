<?php
// Cette page sert uniquement à faire fonctionner la page jeu.php

header("Content-type: text/plain; charset=UTF-8");

//Connection à la base de données
require("param.inc.php");
$pdo = new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
$pdo->query("SET NAMES utf8");
$pdo->query("SET CHARACTER SET 'utf-8'");

//Choisir une musique au hasard selon un critère
//A AMELIORER : Récupérer le critère de la page de sélection
//Ajouter "WHERE" pour critère
$requete = "SELECT IdMusique, NomMusique, NomAuteur FROM MUSIQUES WHERE IdMusique <> '137261720' ORDER BY RAND() LIMIT 1";
$resultats = $pdo->query($requete);
$resultats = $resultats->fetch(PDO::FETCH_ASSOC);
    
//Cette fonction retourne un tableau qui contient un texte à trous
//ainsi qu'un tableau qui contient chaque mot caché

function cacherMots($phrase) {
    $tabMots = str_word_count($phrase, 1);  
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
        
        $phrase = str_replace(" ".$elt." ", " ".$strReplace." " , $phrase);
    }
    
    return array(
        "motsCaches" => $motsCaches,
        "phrase" => $phrase
    );
}

//Sélectionner des paroles au hasard parmis celles disponibles pour la chanson en cours
$requete = "SELECT Paroles, IdParoles FROM PAROLES WHERE IdMusique = '".addslashes($resultats["IdMusique"])."' ORDER BY RAND() LIMIT 1";
$paroles = $pdo->query($requete);
$paroles = $paroles->fetch(PDO::FETCH_ASSOC);

$arrayText = cacherMots($paroles["Paroles"]);
$string = "";
foreach($arrayText["motsCaches"] as $elt) {
    $string = $string.$elt;
    $string = $string." ";
}

echo(json_encode("IdMusique=".$resultats['IdMusique'].
                 ";NomMusique=".$resultats['NomMusique'].
                 ";NomAuteur".$resultats['NomAuteur'].
                 ";MotsCaches=".$string.
                 ";Phrase=".$arrayText['phrase'].
                 ";IdParoles=".$paroles['IdParoles']));