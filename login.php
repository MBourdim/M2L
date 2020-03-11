<?php
session_start();
include('./fonction.inc.php');
$dbh = connexion();

if(isset($_POST['submit'])) {
   echo 
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $password = $_POST['password'];
   if(!empty($pseudo) AND !empty($password)) {
      $pseudo = mysqli_real_escape_string($connect,$_POST['pseudo']);
      $password = mysqli_real_escape_string($connect,$_POST['password']);
      $query ="SELECT * FROM user WHERE pseudo = '$pseudo'";
      $result = mysqli_query($connect,$query);
         if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){               //https://www.youtube.com/watch?v=eP6DIY78U74
            $password_hash = $row['password'];
            if(password_verify($password,$password_hash)){
               $requser = $dbh->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
               $requser->execute(array($pseudo, $password));
               $userexist = $requser->rowCount();
               if($userexist == 1) {
                  $userinfo = $requser->fetch();
                  $_SESSION['id_user'] = $userinfo['id_user'];
                  $_SESSION['pseudo'] = $userinfo['pseudo'];
                  $_SESSION['mdp'] = $userinfo['mdp'];
                  header("Location: faq.php?id_user=".$_SESSION['id_user']);
               } else {
                  $erreur = "Mauvais mail ou mot de passe !";
               }
            } else {
               $erreur = "Tous les champs doivent être complétés !";
            }   
            }   
         }
            
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
