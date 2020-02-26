<?php

include('./fonction.inc.php');
$dbh = connexion();
?>
<?php
$pseudo=isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
$password=isset($_POST['password']) ? $_POST['password'] : '';
$submit=isset($_POST['submit']);
$sql = "select * from user";
try {
$sth = $dbh->prepare($sql);
$sth->execute(array(':pseudo' => $pseudo));
$sth->execute(array(':pseudo' => $pseudo));
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
die("Erreur lors de la requête SQL : " . $ex->getMessage());
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
         <form method="post" action="login.php" id="form1">
            <p>Pseudo <br> <input type="text" name="pseudo" placeholder="Pseudo"/></p>
            <p>Mot de passe <br><input type="password"name="password" placeholder="Mot de passe"/></p>
            <br/><br/>
            <input type="submit" name="submit" value="Se connecter !" />
         </form>
         <?php
         ?>
      </div>
      </div>

   </body>
</html>