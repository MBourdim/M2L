<?php
include("menu.php");
include('./fonction.inc.php');
$dbh = connexion();
?>
<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deconnexion</title>
</head>
<div align="center">
<h2>Vous avez été deconnecté</h2>   
</div>

<body>
</body>
</html>

