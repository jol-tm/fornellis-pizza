<?php
    include_once '../conn.php';

    include_once "../classes/cliente.php";
    $cliente = new Cliente();
    if ($cliente->login($_POST['email'], $_POST['pass'])) {
        session_start();
        $_SESSION['userid'];
        header('Location: ../index.php');
    } else {
        echo "Usuário ou senha incorreto.";
    }
?>