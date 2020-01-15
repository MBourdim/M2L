<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=m2l', 'root', '');

if(isset($_POST['formconnexion'])) {
   $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
      $requser->execute(array($pseudoconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['peudo'] = $userinfo['pseudo'];
         header("Location: faq.php?id=".$_SESSION['id']);
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
   </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <p>Veillez remplir le formulaire</p>
         <form method="POST" action="">
            <b>Pseudo</b>
            <br>
            <input type="pseudo" name="peudoconnect" placeholder="Entrer le pseudo" required>
            <br>
            <b>Mot de passe</b>
            <br>
            <input type="password" name="mdpconnect" placeholder="Mot de passe" required>
            <br><br>
            <input type="submit" name="formconnexion" value="Connexion" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>