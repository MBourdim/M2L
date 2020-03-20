<?php 
session_start();
include('./fonction.inc.php');
$dbh = connexion();

if(isset($_POST['submit'])){
   if(!empty($_POST['reponse'])){
   $insertsql = $dbh->prepare('INSERT INTO faq(reponse) VALUES (?)');
   $insertsql->execute(array($_POST['reponse']));
   $question = $_POST['question'];
   }
  }
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
  <li><a href="list.php">Liste des questions</a></li>
  <li><a href="add.php">Ajouter une question</a></li>
  <li><a href="edit.php"class="active">Répondre à une question</a></li>
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
 
        echo "<tr><th>Questions</th><th>Action</th>"; // affichage de l'entête du tableau
        foreach ($rows as $row) { // afficher le contenu de la base de donnée 
            echo "<tr>";
            echo "<td>".$row['question']."</td>";
            echo '<td><img src="img/pencil.png" alt="edit"><img src="img/cancel.png" alt="bouton delete"></td>';
            echo "</tr>";
        }
  echo"</table>";
?>       
    </center>
<br><br>
<center>
<form action="" method="post">
      <div>
      <p>Reponse : <br><textarea type="text"name="question" rows="10" placeholder="Reponse"></textarea></p>
        </div>
      <br>
      <input type="submit" name="submit" value="Envoyer" />
    </form>      
    </center>
</body>
</html>