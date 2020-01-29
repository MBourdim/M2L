<?php /* Script de connexion à la BDD M2L */
$bdd = new PDO('mysql:host=localhost;dbname=m2l', 'root', '');    /*Connexion entre PHP et MySQL */

if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);  
   $mdp = sha1($_POST['mdp']);      /*Hachage du mot de passe avec SHA1*/
   $foot = htmlspecialchars($_POST['foot']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {    /*Condition > le pseudo doit être inférieur ou égal à 255 caractères */
         if($mail == $mail2) {      /*Vérification de la confirmation du mail (mail 1 = mail 2) */
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  $insertmbr = $bdd->prepare("INSERT INTO user(pseudo, mail, mdp) VALUES(?, ?, ?)");  /*Requête SQL insertion des données remplies dans la table USER */
                  $insertmbr->execute(array($pseudo, $mail, $mdp));
                  $erreur = "Votre compte a bien été créé ! <a href=\"login.php\">Me connecter</a>";     /*Renvoi sur la page login après inscription */
                  
               } else {
                  $erreur = "Adresse mail déjà utilisée !";    /*Erreur adresse mail*/
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";    /*Erreur adresse mail*/
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";    /*Erreur adresse mail*/
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";   /*Erreur pseudo*/
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";    /*Non remplissage des champs obligatoires*/
   }
}
?>
<?php 
include 'D:\xampp\htdocs\projects\M2L-1\menu.php'
?>
<html>
   <head>
      <title>Inscription</title>
      <meta charset="utf-8">
   </head>
   <body>
    <div align="center">
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">      <!-- Formulaire HTML -->
            <b>Pseudo</b>     <!-- Champ insertion pseudo -->
            <br>
               <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
            <br><br>
            <b for="mail">Mail</b>     <!-- Champ insertion mail -->
            <br>
                <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
            <br><br>
            <b for="mail2">Confirmation du mail</b>      <!-- Champ confirmation du mail -->
            <br>
                <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
            <br><br>
            <b for="mdp">Mot de passe</b>    <!-- Champ insertion mot de passe -->
            <br>
                <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
            <br><br>
            <b for="ligue">Ligue</b>   <!-- Selection de la ligue -->
            <select name="Ligue" size="1">      <!-- Liste déroulante pour sélectionner la ligue -->
            <option type="text" id="foot" name="foot" value="<?php if(isset($foot)) { echo $foot; } ?>">Ligue de Football</option>
            <option type="text" id="rugby" name="rugby" value="<?php if(isset($rugby)) { echo $rugby; } ?>">Ligue de Rugby</option>
            <br>     
            <input type="submit" name="forminscription" value="Je m'inscris" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";    /*Erreur en cas de non-remplissage des champs obligatoires */
         }
         ?>
      </div>
   </body>
</html>