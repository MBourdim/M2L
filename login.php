<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=m2l', 'root', '');

if(isset($_POST['formconnexion'])) {
   $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
      $requser->execute(array($pseudoconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id_user'] = $userinfo['id_user'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         header("Location: faq.php?id_user=".$_SESSION['id_user']);
      } else {
         $erreur = "Mauvais pseudo ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

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
<html lang="en">
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
        <br>
        <br>
        <h1>Bienvenue sur le site de la FAQ</h1>
        <br>
        <br>
        <h3>Veuillez vous inscrire pour continuer</h3>
        <br>
        <span class="imageDroite"><img src="img/footanim.gif" align="right" height="500px"/></span>
        <br>
        <br>
        <div class="vertical-menu">
                <a href="faq.php"class="active">Accueil de la FAQ</a>
                <a href="index.php">Maison des ligues</a>
                <a href="football.php">Ligue de Football</a>
                <a href="add.php">Ajouter une question</a>
                <a href="list.php">Liste des questions</a>
                <a href="register.php">Inscription</a>
                <a href="login.php">Connexion</a>
                <a href="logout.php">Déconnexion</a>
        </div>
      <div class="center-menu">
      <div align="center">
         <h2>Connexion</h2>
         <br/><br />
         <form method="POST" action="">
            <input type="text" name="pseudoconnect" placeholder="Pseudo" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>   
      </div>
      
      </div>

        <br>
        <br>
        <br>
        <br>
        </div>
</div>

</body>
</html>