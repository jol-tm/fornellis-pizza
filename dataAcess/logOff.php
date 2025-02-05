<?php
    session_start();
    if (isset($_GET['edited'])) {
        session_destroy();
        header("Location: ../index.php?edited");
    } elseif (isset($_GET['deleted'])) {
        session_destroy();
        header("Location: ../index.php?deleted");
    } else {
        session_destroy();
        header("Location: ../index.php");
    }
?>