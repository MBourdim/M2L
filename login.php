<?php

include('./fonction.inc.php');
$dbh = connexion();
?>
<?php

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
<html>
   <head>
      <title>Login</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/FAQ.css">
   </head>
   <body>
   <div class="outer-div">
    <div class="inner-div">
    <center><img class="imagecentre1" width="500" height="200" alt="imgc1" src="img/FAQfoot.png"></center>
</div>
<br>
<br>

   <div class="outer-div2">
        <div class="inner-div2">
        <br><br>
        <h1>Bienvenue sur le site de la FAQ</h1>
        <br><br>
        <h3>Veuillez vous inscrire pour continuer</h3>
        <br><br>
        <div class="vertical-menu">
                <a href="faq.php"class="active">Accueil de la FAQ</a>
                <a href="index.php">Maison des ligues</a>
                <a href="football.php">Ligue de Football</a>
                <a href="list.php">Liste des questions</a>
                <a href="add.php">Ajouter une question</a>
                <a href="login.php">Connexion</a>
                <a href="logout.php">Déconnexion</a>
                <a href="register.php">Inscription</a>
        </div>
        <span class="imageDroite"><img src="img/footanim.gif" align="right" height="500px"/></span>

      
      <div align="center">
         <h2>Connexion</h2>
         <br/><br/>
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

   </body>
</html>