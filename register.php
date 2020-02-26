<?php

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
      <link rel="stylesheet" href="css/FAQ.css">
   </head>
   <body>
<<<<<<< HEAD
   <div class="outer-div">
    <div class="inner-div">
    <center><img class="imagecentre1" width="500" height="200" alt="imgc1" src="img/FAQfoot.png"></center>
</div>
<br><br>
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
         <h2>Inscription</h2>
         <br />
         <form method="POST" action="">
            <b>Pseudo</b>
            <br>
               <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
            <br><br>
            <b for="mail">Mail</b>
            <br>
                <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
            <br><br>
            <b for="mail2">Confirmation du mail</b>
            <br>
                <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
            <br><br>
            <b for="mdp">Mot de passe</b>
            <br>
                <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
            <br><br>
            <b for="ligue">Ligue</b>
            <br>
            <select name="Ligue" size="1">
            <option type="text" id="foot" name="foot" value="1"<?php if(isset($foot)) { echo $foot; } ?> >Ligue de Football</option>
            <option type="text" id="rugby" name="rugby" value="2"<?php if(isset($rugby)) { echo $rugby; } ?> >Ligue de Rugby</option>
            <br>     
            <input type="submit" name="forminscription" value="Je m'inscris" />
            
=======
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
>>>>>>> e5d37d91314c877c133116a4f7260b48289ec446
         </form>
         
         <?php
<<<<<<< HEAD
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
 
         ?>
      </div>
      
      </div>
      </div>
=======
         ?>
      </div>
   
>>>>>>> e5d37d91314c877c133116a4f7260b48289ec446
   </body>
</html>