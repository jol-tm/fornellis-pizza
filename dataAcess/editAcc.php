<?php
    session_start();
    include_once "../classes/cliente.php";
    $cliente = new Cliente();
    if (isset($_POST['updateAcc'])) {
        if ($cliente->editAcc($_POST['nome'], $_POST['email'], $_POST['tel'], $_POST['pass'], $_POST['adress'], $_SESSION['userid'])) {
            header('Location: dataAcess/logOff.php');
        }
    } elseif (isset($_POST['deleteAcc'])) {
        if ($cliente->deleteAcc($_SESSION['userid'])) {
            header('Location: dataAcess/logOff.php');
        }
    }
?>