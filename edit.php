<?php 
session_start();
include('./fonction.inc.php');
$dbh = connexion();

if(isset($_SESSION['droit'])){
  if($_SESSION['droit'] <> 3){
    if($_SESSION['droit'] <> 2 && $_SESSION['ligue'] <> 1){
      header('Location:faq.php?notif=4');
    }
    else{
      header('Location:faq.php?notif=2');
    }
  } 
}
else{
  header('Location:faq.php?notif=3');
}

if(isset($_POST['submit'])){
  $updatesql = 'UPDATE faq SET question=:question,reponse=:reponse,dat_reponse=NOW() WHERE id_faq = :id_faq';
  $params=array(
    ':question' => $_POST['question'],
    ':reponse' => $_POST['reponse'],
    ':id_faq' => $_GET['id_faq']
  );
  db_insert($dbh,$updatesql,$params);
  header('Location:list.php?option=1');
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
</ul>
<br>
<center>
<?php
  $sql = "SELECT question, reponse from faq where id_faq = :id_faq";
  $params = array(
    ':id_faq' => $_GET['id_faq']
  );
  $row=db_exehash($dbh,$sql,$params);
  $question=$row['question'];
  $reponse=$row['reponse'];
?> 

<br><br>
  <form action="edit.php?id_faq=<?php echo $_GET['id_faq'];?>" method="post">
    <p>Question : <br><textarea type="text"name="question" rows="10"><?php echo $question; ?></textarea></p>
    <p>Réponse : <br><textarea type="text"name="reponse" rows="10"><?php echo $reponse; ?></textarea></p>
    <br>
    <input type="submit" name="submit" value="Envoyer" />
  </form>      
    </center>
</body>
</html>