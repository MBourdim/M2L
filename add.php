<!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout FAQ</title>
  </head>
  <body>
    <h2>Ajouter une question à la FAQ</h2>
    <p style ="color :grey">Veuillez saisir votre question</p>


    <form action="/sql" method="post">Question
      <div>
        <input type="text" style="width: 400px; height: 200px;" />
        </div>
      <br>
      <div class="bouton">
        <button type="submit">Enregistrer</button>
      </div>
    </form>
  </body>
</html>