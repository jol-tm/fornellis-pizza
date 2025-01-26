<?php
    include_once "../classes/pedido.php";
    include_once '../classes/conn.php';

    session_start();
    $conn = new Conn();
    $pedido = new Pedido($conn->conectar());

    if (isset($_POST['accept'])) {
        if ($pedido->manageOrder('accept', $_SESSION['userid'])) {
            header("Location: ../orders.php");
        }
    } elseif (isset($_POST['deny'])) {
        if ($pedido->manageOrder('deny', $_SESSION['userid'])) {
            header("Location: ../orders.php");
        }
    }
?>