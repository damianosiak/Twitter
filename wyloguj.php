<?php
    session_start();
    $_SESSION['login']="";
    $_SESSION['haslo']="";
    $_SESSION['id']="";
    session_destroy();
    echo "<script>document.location.replace('logowanie.php')</script>";
?>