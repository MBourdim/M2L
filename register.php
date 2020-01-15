<?php/*
  //Variables//

  $pseudo = $_POST['pseudo'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  //Connexion BD SQL//
  $connection = mysql_connect("localhost","root","");

  //Table selectionnée SQL (user)//
  if($select = mysql_select_db("user",$connection))   
    {
      //Insertion dans la base de donnée//
      $sql= "INSERT INTO user (pseudo, mdp, mail) 
      VALUES('$pseudo','$password','$email')";
      mysql_query($sql);
    }
  else
  {
      //Message d'erreur//
      echo"Mauvaise DB selectionnée";   
  }

  //Deconnexion du SGBD//
  mysql_close($connection);
*/
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inscription</title>
</head>
<body>
  <h1 style="font-family: Calibri">Inscription à la FAQ</h1>
  <p style ="color :grey">Veuillez fournir vos coordonnées</p> 

    <form method="post" action="inscription.php">
      Pseudo:<br>
      <input type="text" name="Nom" required="required">
      <br>
      Mot de passe:<br>
      <input type="password" name="password" required="required">
      <br>
      Mail:<br> 
      <input type="email" name="email" required="required">
      <br>
      Ligue:<br>
      <select name="nom" size="1">
        <option>Ligue de football
        <option>Ligue de Rugby
        <option>Ligue de Osef
      </select>
    </form>

    <!--Saut de ligne bouton enregistrer -->
    <form>
      <br>
      <input type="submit" name="envoi" value="Enregistrer"/>
    </form>
</body>
</html>