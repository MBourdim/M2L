
<?php
include('./fonction.inc.php');

$dbh = connexion();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repondre</title>
    <link rel="stylesheet" type="text/css" href="css/edit-liste.css">
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
<br>
<center>
<?php
$sql = "SELECT  pseudo , id_faq , reponse ,question
FROM faq , user 
WHERE faq.id_user = user.id_user   ";
try {   
    $sth = $dbh->prepare($sql);
    $sth->execute(); //éxecute
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC); // fetchall Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
  } catch (PDOException $ex) {
   die("Erreur lors de la requête SQL : ".$ex->getMessage());
  }
echo "<table>";
 
        echo "<tr><th>Num</th><th>Auteur</th><th>Question</th><th>reponse</th><th>Action</th>"; // affichage de l'entête du tableau
        foreach ($rows as $row) { // afficher le contenu de la base de donnée 
            echo "<tr>";
            echo "<td>".$row['id_faq']."</td>"; 
            echo "<td>".$row['pseudo']."</td>";
            echo "<td>".$row['question']."</td>";
            echo "<td>".$row['reponse']."</td>";
            echo '<td><img src="img/pencil.png" alt="edit"><img src="img/cancel.png" alt="bouton delete"></td>';
            echo "</tr>";
        }
  echo"</table>";
 ?>     

<br><br>
</body>    
 
    
</html>