
<?php

include('fonction.inc.php');
$dbh = connexion();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/edit-liste.css">
  <title>Liste des questions FAQ</title>
</head>
<body>
<div class="outer-div">
    <div class="inner-div">
    <center><img class="imagecentre1" width="500" height="200" alt="imgc1" src="img/FAQfoot.png"></center>
  </div>
</div>
<br>
<ul>
  <li><a href="faq.php">Accueil de la FAQ</a></li>
  <li><a href="list.php"class="active">Liste des questions</a></li>
  <li><a href="add.php">Ajouter une question</a></li>
  <li><a href="edit.php">Répondre à une question</a></li>
  <li><a href="delete.php">Supprimer une question</a></li>
</ul>
<br><br>
</body>    
 
    
</html>