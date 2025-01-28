<?php
    session_start();
    if (session_destroy()) {
        $_SESSION['loginoff'] = "Conta desconectada.";
        header("Location: ../index.php");
    } 
?>