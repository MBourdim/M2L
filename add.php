<?php 
session_start();
include('./fonction.inc.php');
$dbh = connexion();

if(isset($_POST['submit'])){
   if(!empty($_POST['question'])){
   $insertsql = $dbh->prepare('INSERT INTO faq(question) VALUES (?)');
   $insertsql->execute(array($_POST['question']));
   $question = $_POST['question'];
   }
  }
?>
<!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/edit-liste.css">
    <title>Ajouter des questions FAQ</title>

    <title>Ajout FAQ</title>
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
  <li><a href="add.php"class="active">Ajouter une question</a></li>
  <li><a href="edit.php">Répondre à une question</a></li>
  <li><a href="delete.php">Supprimer une question</a></li>
</ul>
<br><br>
<br><br>
    <center>
    <h2>Ajouter une question à la FAQ</h2>
    <p style ="color :grey">Veuillez saisir votre question</p>


    <form action="" method="post">
      <div>
      <p>Question : <br><textarea type="text"name="question" rows="10" placeholder="Reponse"></textarea></p>
        </div>
      <br>
      <input type="submit" name="submit" value="Envoyer" />
    </form>      
    </center>
    
  </body>
</html>