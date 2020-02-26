<?php
include ("menu.php");
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