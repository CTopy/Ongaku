<?php
header("Content-type: text/plain; charset=UTF-8");
$pdo = new PDO("mysql:host=http://la-myweb.univ-lemans.fr/phpMyAdmin; dbname=MMI1_i171876_Ongaku_v1", "i171876", "dto88yt");
$pdo->query("SET NAMES utf8");
$pdo->query("SET CHARACTER SET 'utf-8'");

$requete = "SELECT IdMusique FROM MUSIQUES WHERE IdLangue == 'FRA'";
$pdo->query($requete);
$tabMusiques = $pdo->lastInsertId();

for($i = 1; $i < $tabMusiques.count(); $i++) {
echo($tabMusiques[$i]);
}
?>