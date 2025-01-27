<?php 
    include_once "../classes/cliente.php";
    include_once '../classes/conn.php';

    $conn = new Conn();
    $cliente = new Cliente($conn->conectar());

    if ($cliente->signUp($_POST['nome'], $_POST['email'], $_POST['tel'], $_POST['pass'], $_POST['adress'])) {
        header('Location: ../index.php?cadastro=sucesso');
    } else {
        header('Location: ../index.php?cadastro=falha');
    }
?>