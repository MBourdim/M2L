<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAQ</title>
    <link rel="stylesheet" href="css/FAQ.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/m2lfoot.png" />
</head>
<body>
<div class="outer-div">
    <div class="inner-div">

    <center><img class="imagecentre1" width="500" height="200" alt="imgc1" src="img/FAQfoot.png"></center>
</div>
<br>
<div class="outer-div2">
        <div class="inner-div2">
        <br><br>
        <h1>Bienvenue sur le site de la FAQ</h1>
        <br><br>
        <?php
       
            if (isset($_GET['notif'])) {
                switch ($_GET['notif']) {
                case 0:
                echo'<h3>Vous avez été déconnecté !</h3>';
                break;
                case 1:
                echo'<h3>Vous êtes inscrit, vous pouvez vous connecter !</h3>';
                break;
                case 2:
                echo"<h3 class='rouge'>Vous n'avez pas accès à cette page !</h3>";
                break;
                case 3:
                echo"<h3 class='rouge'>Vous n'êtes pas connecté !</h3>";
                break;
                case 4:
                echo"<h3 class='rouge'>Vous n'appartenez pas à cette ligue !</h3>";
                break;
                }
            } 

            if(isset($_SESSION['pseudo'])){
                echo'<h3>Bienvenue '.$_SESSION['pseudo'].' !</h3>';
            }
        
        ?>
        <br><br>
        <div class="vertical-menu">
                <a href="faq.php"class="active">Accueil de la FAQ</a>
                <a href="index.php">Maison des ligues</a>
                <a href="football.php">Ligue de Football</a>
                <?php
                if(!isset($_SESSION['pseudo']))
                {
                    echo '<a href="login.php">Connexion</a>';
                    echo '<a href="register.php">Inscription</a>';
                } 
                else {
                    echo "<a href='list.php'>Liste des questions</a>"; 
                    echo "<a href='add.php'>Ajouter une question</a>"; 
                    echo '<a href="logout.php">Déconnexion</a>';
                }
                ?>
        </div>
        <span class="imageDroite"><img src="img/footanim.gif" align="right" height="500px"/></span>
        </div>
    </div>
</body>
</html>