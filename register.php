<?php
include("menu.php");
include('./fonction.inc.php');
$dbh = connexion(); // Connexion à la base de données
?>
<?php

if(isset($_POST['submit'])){
   if(!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password'])){
      $pseudo=$_POST['pseudo'];
      $pseudolength = strlen($pseudo);
      if($pseudolength >= 3) {
   $password = sha1($_POST['password']);
   $insertsql = $dbh->prepare('INSERT INTO user(pseudo,mdp,mail,id_ligue) VALUES (?,?,?,?)');
   $insertsql->execute(array($_POST['pseudo'],$password,$_POST['mail'],$_POST['ligue']));
   echo "$pseudolength";      
}else{
   $erreur = "pseudo";
   echo "$erreur";
}
   }else{
      $erreur = "Tous les champs doivent être complétés !";
      echo "salut compe";
   }
}

                        

?>
<html>
   <head>
      <title>Inscription</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Inscription</h2>
         <br/><br/>
         <form method="post" action="register.php" id="form1">
            <p>Pseudo <br> <input type="text" name="pseudo" placeholder="Pseudo"/></p>
            <p>Mail <br> <input type="text" name="mail" placeholder="Mail"/></p>
            <p>Mot de passe <br><input type="password"name="password" placeholder="Mot de passe"/></p>
            <br>
            <p>
            <select name="ligue">
            <option value="1" selected>Football</option>
            <option value="2" selected>Basket</option>
            <option value="3" selected>Volley-ball</option>
            <option value="4" selected>Handball</option>
            </select>
            </p>
            <br/><br/>
            <input type="submit" name="submit" value="Se connecter !" />
         </form>
         <?php
         ?>
      </div>
   
   </body>
</html>