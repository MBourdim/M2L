<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/FAQ.css">
</head>
<body>
    
</body>
</html>
<html>
   <head>
      <title>Faq</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center" class ="profil">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         <p>Pseudo = <?php echo $userinfo['pseudo']; ?></p>
         <br />
         <p>Mail = <?php echo $userinfo['mail']; ?></p>
         <br />
         <?php
         if(isset($_SESSION['id_user']) AND $userinfo['id_user'] == $_SESSION['id_user']) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="logout.php">Se déconnecter</a>
      </div>
   </body>
</html>
<?php  
}
?>

