<?php
  session_start();
  include('./fonction.inc.php');
  $dbh = connexion();
  if(isset($_SESSION['pseudo'])){
    if($_SESSION['ligue'] <> 1 && $_SESSION['ligue'] <> 5){
      header('Location:faq.php?notif=4');
    }
  }
  else{
    header('Location:faq.php?notif=3');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des questions</title>
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
    
  if (isset($_GET['option'])) {
    switch ($_GET['option']) {
    case 0:
    echo'<h3>Une question ajoutée !</h3>';
    break;
    case 1:
    echo'<h3>Une question modifiée !</h3>';
    break;
    case 2:
    echo"<h3>Une question supprimée !</h3>";
    break;
    }
  } 
  
  echo "<table>";
  echo "<tr><th>Num</th><th>Auteur</th><th>Question</th><th>reponse</th><th>Action</th>"; // affichage de l'entête du tableau
  foreach ($rows as $row) { // afficher le contenu de la base de donnée 
      echo "<tr>";
      echo "<td>".$row['id_faq']."</td>"; 
      echo "<td>".$row['pseudo']."</td>";
      echo "<td>".$row['question']."</td>";
      echo "<td>".$row['reponse']."</td>";
      echo '<td><a href="edit.php?id_faq='.$row['id_faq'].'"><img src="img/pencil.png" alt="edit"></a>';
      echo '<a href="delete.php?id_faq='.$row['id_faq'].'"><img src="img/cancel.png" alt="bouton delete"></a></td>';
      echo "</tr>";
        }
  echo"</table>";
?>     

<br><br>
</body>    
 
    
</html>