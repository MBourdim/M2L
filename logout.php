<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location:faq.php?notif=0');
?>

