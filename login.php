<?php
session_start();
include('./fonction.inc.php');
$dbh = connexion();


if(isset($_POST['submit'])) {
   $pseudo=isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
   $password=isset($_POST['password']) ? $_POST['password'] : '';  
   if(!empty('pseudo') AND !empty('password')) {
      $requser = $dbh->prepare("SELECT * FROM user");
      $requser->execute(array($pseudo, $password));
         $_SESSION['pseudo'] = $pseudo;
         $_SESSION['mdp'] = $password;
         echo "Salut";
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
}
?>

<html>
   <head>
      <title>Connexion</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/FAQ.css">
   </head>
   <body>
   <div class="outer-div">
    <div class="inner-div">
    <center><a href="faq.php"><img class="imagecentre1" width="500" height="200" alt="imgc1" src="img/FAQfoot.png"></a></center>
</div>
<br><br>
<html>
   <head>
      <title>Connexion</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br/><br/>
         <form method="post" action="login.php" id="form1">
            <p>Pseudo <br> <input type="text" name="pseudo" placeholder="Pseudo"/></p>
            <p>Mot de passe <br><input type="password"name="password" placeholder="Mot de passe"/></p>
            <br/><br/>
            <input type="submit" name="submit" value="Se connecter !" />
         </form>
         <?php
         ?>
      </div>
   
   </body>
</html>
