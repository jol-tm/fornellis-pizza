<?php
    include_once '../classes/cliente.php';
    include_once '../classes/conn.php';

    $conn = new Conn();
    $cliente = new Cliente($conn->conectar());

    if ($user = $cliente->login($_POST['email'], $_POST['pass'])) {
        session_start();
        $_SESSION['userid'] = $user['id'];
        $_SESSION['userno'] = $user['nome'];
        $_SESSION['userem'] = $user['email'];
        $_SESSION['usernu'] = $user['numero'];
        $_SESSION['userse'] = $user['senha'];
        $_SESSION['useren'] = $user['endereco'];
        header('Location: ../index.php');
    } else {
        header('Location: ../index.php?loginerro');
    }
?>