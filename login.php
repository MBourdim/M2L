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
        <?php
            if(isset($_GET['erreur'])){
               if($_GET['erreur']==1){
                  echo"<p class='rouge'>Erreur mot de passe ou identifiant éronné</p>";
               }
            }
        ?>
         <form action="login_post.php" method="post">
            <label for="nom">Pseudo :</label>
            </br>
            <input type="text" name="pseudo" id="nom" required/>
            </br>
            <label for="mdp">Mot de passe :</label>
            </br>
            <input type="password" name="mdp" id="mdp" required/>
            <input type="submit" value="Connexion"/>
            </br>
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
