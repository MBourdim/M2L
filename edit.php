<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repondre</title>
    <link rel="stylesheet" type="text/css" href="css/repondre.css">
</head>
<body>
<div class="outer-div">
    <div class="inner-div">
    <center><img class="imagecentre1" width="500" height="200" alt="imgc1" src="img/FAQfoot.png"></center>
</div>
<br><br>
<ul>
    <li><a href="faq.php"class="active">Accueil de la FAQ</a></li>
    <li><a href="index.php">Maison des ligues</a></li>
    <li><a href="football.php">Ligue de Football</a></li>
    <li><a href="list.php">Liste des questions</a></li>
    <li><a href="add.php">Ajouter une question</a></li>
    <li><a href="login.php">Connexion</a></li>
    <li><a href="logout.php">Déconnexion</a></li>
    <li><a href="register.php">Inscription</a></li>
</ul>
<br>
<center>
<form action="/sql" method="post">Question
      <div>
        <input type="text" style="width: 400px; height: 200px;" readonly />
        </div>
      <br>

    </form>      
    </center>
<br><br>
<center>
<form action="/sql" method="post">Reponse à la question
      <div>
        <input type="text" style="width: 400px; height: 200px;" />
        </div>
      <br>
      <div class="bouton">
        <button type="submit">Enregistrer</button>
      </div>
    </form>      
    </center>
</body>
</html>