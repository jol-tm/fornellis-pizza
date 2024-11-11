<?php
    include_once '../conn.php';
    include_once '../classes/cliente.php';
    include_once '../classes/conn.php';

    $conn = new Conn();
    $cliente = new Cliente($conn->conectar());

    if ($user = $cliente->login($_POST['email'], $_POST['pass'])) {
        session_start();
        $_SESSION['userid'] = $user[0]['id'];
        $_SESSION['userno'] = $user[0]['nome'];
        $_SESSION['userem'] = $user[0]['email'];
        $_SESSION['usernu'] = $user[0]['numero'];
        $_SESSION['userse'] = $user[0]['senha'];
        $_SESSION['useren'] = $user[0]['endereco'];
        header('Location: ../index.php');
    } else {
        echo "Usuário ou senha incorreto.";
    }
?>