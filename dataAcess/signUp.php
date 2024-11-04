<?php 
    include_once "../classes/cliente.php";
    $cliente = new Cliente($_POST['nome'], $_POST['email'], $_POST['tel'], $_POST['pass'], $_POST['adress']);
    echo $cliente->signUp();
?>