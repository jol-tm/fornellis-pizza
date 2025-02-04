<?php
    session_start();
    if (!isset($_GET['deleted'])) {
        session_destroy();
        header("Location: ../index.php?off");
    } elseif (isset($_GET['deleted'])) {
        session_destroy();
        header("Location: ../index.php?deleted");
    }
?>