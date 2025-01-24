<?php
    include_once "../classes/pedido.php";
    include_once '../classes/conn.php';

    $conn = new Conn();
    $pedido = new Pedido($conn->conectar());

    if (isset($_POST['accept'])) {
        if ($pedido->manageOrder('accept')) {
            header("Location: ../orders.php");
        }
    } elseif (isset($_POST['deny'])) {
        if ($pedido->manageOrder('deny')) {
            header("Location: ../orders.php");
        }
    }
?>