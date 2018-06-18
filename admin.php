<?php

header("Content-type: text/html; charset=UTF-8");

//Connection à la base de données
require("param.inc.php");
$pdo = new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
$pdo->query("SET NAMES utf8");
$pdo->query("SET CHARACTER SET 'utf-8'");

echo("<h1>test</h1>")
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow">
    <title>Ongaku - Admin</title>
    <meta charset="utf-8">
    <meta name="description" content="Interface administrateur">
    <link rel="stylesheet" href="css/styleGeneral.css" />
</head>

<body>
    <main>
        <h1>Ongaku - Interface administrateur</h1>
        <h2>Ajouter une musique et des paroles</h2>
        <form method="post" action="traitementadmin.php">
            <label>Id de la musique sur Deezer</label>
            <input required type="text" name="IdMusique" />

            <label>Id Langue</label>
            <select name="idlangue">
                <?php

                ?>
            </select>
        </form>
    </main>
</body>

</html>