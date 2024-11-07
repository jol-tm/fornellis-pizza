<?php
    session_start();
    include_once "../classes/produto.php";
    $produto = new Produto();

    if (isset($_POST['editProduct'])) {
        if ($produto->editProduct($_POST['nome'], $_POST['categ'], $_POST['desc'], $_POST['preco'], /*$_POST['img'],*/ $_POST['editProduct'])) {
            header('Location: ../editMenu.php');
        }
    } elseif (isset($_POST['deleteProduct'])) {
        if ($produto->deleteProduct($_POST['deleteProduct'])) {
            header('Location: ../editMenu.php');
        }
    }
?>