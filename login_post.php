<?php
session_start();  // démarrage d'une session

// on vérifie que les données du formulaire sont présentes
if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    require 'fonction.inc.php';
    $bdd = getBdd();
    // cette requête permet de récupérer l'utilisateur depuis la BD
    $requete = "SELECT * FROM user WHERE pseudo=? AND mdp=?";
    $resultat = $bdd->prepare($requete);
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $resultat->execute(array($pseudo, $mdp));
    if ($resultat->rowCount() == 1) {
        // l'utilisateur existe dans la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['login'] = $pseudo;
        $_SESSION['mdp'] = $mdp;
        // cette variable indique que l'authentification a réussi
        $authOK = true;
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Résultat de la connexion</title>
</head>
<body>
    <h1>Résultat de la connexion</h1>
    <?php
    if (isset($authOK)) {
        echo "<p>Vous avez été reconnu(e) en tant que ".escape($pseudo)."</p>";
        echo '<a href="menu.php">Retour à la page d\'accueil</a>';
    }
    else { ?>
        <p>Vous n'avez pas été reconnu(e)</p>
        <p><a href="login.php">Nouvel essai</p>
    <?php } ?>
</body>
</html>