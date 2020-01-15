<?php
$bdd = new PDO('mysql:host=localhost;dbname=m2l', 'root', '');

if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $foot = htmlspecialchars($_POST['foot']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  $insertmbr = $bdd->prepare("INSERT INTO user(pseudo, mail, mdp) VALUES(?, ?, ?)");
                  $insertmbr->execute(array($pseudo, $mail, $mdp));
                  $erreur = "Votre compte a bien été créé ! <a href=\"login.php\">Me connecter</a>";
                  
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
   <head>
      <title></title>
      <meta charset="utf-8">
   </head>
   <body>
      
         <h2>Inscription</h2>
         <br /><br />
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
            <select name="Ligue" size="1">
            <option type="text" id="foot" name="foot" value="<?php if(isset($foot)) { echo $foot; } ?>">Ligue de Football</option>
            <option type="text" id="rugby" name="rugby" value="<?php if(isset($rugby)) { echo $rugby; } ?>">Ligue de Rugby</option>
            <br>     
            <input type="submit" name="forminscription" value="Je m'inscris" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>