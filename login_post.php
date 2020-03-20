<?php
session_start();  // démarrage d'une session

// on vérifie que les données du formulaire sont présentes
if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    include('fonction.inc.php');
    // cette requête permet de récupérer l'utilisateur depuis la BD
    $requete = "SELECT * FROM user WHERE pseudo=:pseudo";
    $dbh = connexion();
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $params=array(
        ':pseudo' => $pseudo,
    );
    $row=db_exehash($dbh, $requete, $params);
        $mdh = password_verify($mdp,$row['mdp']);
        if ($mdh) {
            // l'utilisateur existe dans la table
            // on ajoute ses infos en tant que variables de session
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            // cette variable indique que l'authentification a réussi
            $authOK = true;
            header('Location:faq.php');
        }
        else{
        header('Location:login.php?erreur=1');
        }
}
?>