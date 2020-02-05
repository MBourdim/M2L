<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repondre</title>
    <link rel="stylesheet" type="text/css" href="css/tableaux.css">
</head>
<body>
<div class="outer-div">
    <div class="inner-div">
    <center><img class="imagecentre1" width="500" height="200" alt="imgc1" src="img/FAQfoot.png"></center>
  </div>
</div>
<br>
<ul>
  <li><a href="faq.php">Accueil de la FAQ</a></li>
  <li><a href="list.php">Liste des questions</a></li>
  <li><a href="add.php">Ajouter une question</a></li>
  <li><a href="edit.php"class="active">Répondre à une question</a></li>
  <li><a href="delete.php">Supprimer une question</a></li>
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