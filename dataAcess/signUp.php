<?php 
    include_once "../classes/cliente.php";
    $cliente = new Cliente();
    if ($cliente->signUp($_POST['nome'], $_POST['email'], $_POST['tel'], $_POST['pass'], $_POST['adress'])) {
        header('Location: ../index.php');
    } else {
        echo "Erro ao cadastrar";
    }
?>