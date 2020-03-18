<html>
   <head>
      <title>Inscription</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/register.css">
   </head>
   <body>
   <div class="outer-div">
    <div class="inner-div">
    <center><a href="faq.php"><img class="imagecentre1" width="500" height="200" alt="imgc1" src="img/FAQfoot.png"></a></center>
</div>
<br><br>
<html>
   <head>
      <title>Inscription</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Inscription</h2>
         <br/><br/>
         <div class="outer-div2">
        <div class="inner-div2">
        <br>
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
            <input type="submit" name="submit" value="S'inscrire'" />
         </form>
         <?php
         ?>
         </div>
      </div>
   </div>
   </body>
</html>

