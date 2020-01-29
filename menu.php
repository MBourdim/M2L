<?php


$bdd = new PDO('mysql:host=127.0.0.1;dbname=m2l', 'root', '');

if(isset($_GET['id_user']) AND $_GET['id_user'] > 0) {
   $getid_user = intval($_GET['id_user']);
   $requser = $bdd->prepare('SELECT * FROM user WHERE id_user = ?');
   $requser->execute(array($getid_user));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>Faq</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id_user']) AND $userinfo['id_user'] == $_SESSION['id_user']) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <?php
         }
      }
         ?>
      </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAQ</title>
    <link rel="stylesheet" type="text/css" href="css/FAQ.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/m2lfoot.png" />
</head>
<body>
<div class="outer-div">
    <div class="inner-div">
    <center>
    <img class="imagecentre1" width="500" height="200" alt="imgc1" src="img/FAQfoot.png">
   </center>
</div>
<br>
<br>
<div class="outer-div2">
        <div class="inner-div2">
        <div class="vertical-menu"> 
                <a href="faq.php" class="active">Accueil de la FAQ</a>    <!-- Lien vers faq.php -->
                <a href="index.php">Maison des ligues</a>   <!-- Lien vers index.php -->
                <a href="football.php">Ligue de Football</a>    <!-- Lien vers football.php -->
                <a href="list.php">Liste des questions</a>    <!-- Lien vers list.php -->
                <a href="add.php">Ajouter une question</a>    <!-- Lien vers add.php -->
                <a href="login.php">Connexion</a>   <!-- Lien vers login.php -->
                <a href="logout.php">Déconnexion</a>    <!-- Lien vers logout.php -->
                <a href="register.php">Inscription</a>    <!-- Lien vers register.php -->
        </div>
        <br>
        <br>
        <br>
        <br>
        </div>
</div>

</body>
</html>