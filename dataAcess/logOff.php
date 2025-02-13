<?php
    session_start();
    if (isset($_GET['deleted'])) {
        session_destroy();
        header("Location: ../index.php?deleted");
    } else {
        session_destroy();
        header("Location: ../index.php?off");
    }
?>