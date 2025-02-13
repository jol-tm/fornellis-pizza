<?php
    session_start();
    include_once "../classes/cliente.php";
    include_once '../classes/conn.php';

    $conn = new Conn();
    $cliente = new Cliente($conn->conectar());

    if (isset($_POST['updateAcc'])) {
        if ($cliente->editAcc($_POST['nome'], $_POST['email'], $_POST['tel'], $_POST['pass'], $_POST['adress'], $_SESSION['userid'])) { 
            $_SESSION['userno'] = $_POST['nome'];
            $_SESSION['userem'] = $_POST['email'];
            $_SESSION['usernu'] = $_POST['tel'];
            $_SESSION['useren'] = $_POST['adress'];
            header('Location: ../changeRegistration.php?edited');
        }
    } elseif (isset($_POST['deleteAcc'])) {
        if ($cliente->deleteAcc($_SESSION['userid'])) {
            header('Location: logOff.php?deleted');
        }
    }
?>