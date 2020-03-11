<?php
session_start();
include('./fonction.inc.php');
$dbh = connexion();

if(isset($_POST['submit'])) {
   echo 
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $password = $_POST['password'];
   if(!empty($pseudo) AND !empty($password)) {
      $pseudo = strip_tags(mysqli_real_escape_string($connect,trim($pseudo)));
      $password = strip_tags(mysqli_real_escape_string($connect,trim($password)));
      $tbl = mysqli_query($connect,$dbh);
         if(mysqli_num_rows($tbl)>0){
            $row = mysqli_fetch_array($tbl);
            $password_hash = $row['password'];b
            if(password_verify($password,$password_hash)){
               
            }
         }
      $requser = $dbh->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
      $requser->execute(array($pseudo, $password));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id_user'] = $userinfo['id_user'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['password'] = $userinfo['password'];
         $userinfo['id_user'] = $user;
         header('Location: faq.php?pseudo='.$_SESSION['id_user']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>


<html>
   <head>
      <title>Connexion</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/login.css">
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
         <div class="outer-div2">
        <div class="inner-div2">
        <br>
         <form method="post" action="login.php" id="form1">
            <p>Pseudo <br> <input type="text" name="pseudo" placeholder="Pseudo"/></p>
            <p>Mot de passe <br><input type="password"name="password" placeholder="Mot de passe"/></p>
            <br/><br/>
            <input type="submit" name="submit" value="Se connecter !" />
         </form>
      </div>
   </div>
</div>
      <?php
         if(isset($erreur)) {
            echo"<center><br>";
            echo '<font color="red">'.$erreur."</font>";
            echo"</center>";
         }
         ?>
   </body>
</html>
