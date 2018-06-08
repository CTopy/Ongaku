<?php

require("param.inc.php");
    $pdo=new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
    $pdo->query("SET NAMES utf8");
    $pdo->query("SET CHARACTER SET 'utf8'");
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


if(isset($_POST["email"]) && isset($_POST["motDePasse"])){
	//Nous allons demander le hash pour cet utilisateur à notre base de données :
	$query = $pdo->prepare('SELECT MdpJoueur FROM JOUEURS WHERE eMailJoueur = :eMailJoueur');
	$query->bindParam(':eMailJoueur', $_POST["email"]);
	$query->execute();
	$result = $query->fetch();
	$hash = $result[0];
	
	//Nous vérifions si le mot de passe utilisé correspond bien à ce hash à l'aide de password_verify :
	$correctPassword = password_verify($_POST["motDePasse"], $hash);
	
	if($correctPassword){
		//Si oui nous accueillons l'utilisateur identifié
		echo "Bienvenu ".$_POST["username"];
	}else{
		//Sinon nous signalons une erreur d'identifiant ou de mot de passe
		echo "login/password incorrect";
	}
}
?>