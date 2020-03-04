
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
<?php


$sql = "Select * 
from faq , user 
where faq.id_user = user.id_user   
order by question asc";
$sth->execute(); //éxecute
echo "<table>";
        
        echo "<tr><th>Num</th><th>Auteur</th><th>Question</th><th>Action</th>"; // affichage de l'entête du tableau
        foreach ($rows as $row) { // afficher le contenu de la base de donnée 
            echo "<tr>";
            echo "<td>".$row['id_faq']."</td>";  // mettre une Majuscule 
            echo "<td>".$row['pseudo']."</td>";
            echo "<td>".$row['question']."</td>";
            echo "<td> action </td>";
            echo "</tr>";
        
        }
 ?>       
<br><br>
</body>    
 
    
</html>