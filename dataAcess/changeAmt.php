<?php
    include "../classes/pedido.php";

    if (isset($_GET['idCliente']) && isset($_GET['id']) && isset($_GET['act'])) {
        $idC = $_GET['idCliente']; 
        $id = $_GET['id']; 
        $act = $_GET['act']; 
        $pedido = new Pedido();
        if ($act == 'add') {
            if ($pedido->addProduct($id, $idC)) {
                header('Location: ../checkout.php');
            }
        } elseif ($act == 'sub') {
            if ($pedido->subProduct($id, $idC)) {
                header('Location: ../checkout.php');
            };
        }
    }