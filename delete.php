<?php
// on se connecte à notre base
$link=mysql_connect('localhost','root','');

if (!$link){
    die('Not connected :'.mysql_error());
}
$db_selected=mysql_select_db('m2l',$link);
    if(!$db_selected){
        die('Base inaccessible: '.mysql_error());
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <?php


    ?>
</body>
</html>