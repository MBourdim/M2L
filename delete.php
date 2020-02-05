<?php
//connexion a la base de donnée 
include ("menu.php");
include('./fonction.inc.php');
$dbh = connexion();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/tableaux.css">
  <title>Supprimer des questions FAQ</title>
</head>
<body>
<div class="outer-div">
    <div class="inner-div">
    <center><img class="imagecentre1" width="300" height="150" alt="imgc1" src="img/FAQfoot.png"></center>

<ul>
  <li><a href="faq.php">Accueil de la FAQ</a></li>
  <li><a href="list.php">Liste des questions</a></li>
  <li><a href="add.php">Ajouter une question</a></li>
  <li><a href="edit.php">Répondre à une question</a></li>
  <li><a href="delete.php"class="active">Supprimer une question</a></li>
</ul>
<br><br>
<center>
<h1>Ceci est la page supprimer</h1>
</center>


</body>    
 
    
</html>