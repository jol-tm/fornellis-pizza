<?php
include_once "../classes/produto.php";
include_once "../classes/conn.php";

$conn = new Conn();
$produto = new Produto($conn->conectar());

if (isset($_POST['nome'], $_POST['categ'], $_POST['desc'], $_POST['preco'])) {
    if ($produto->addProduct($_POST['nome'], $_POST['categ'], $_POST['desc'], $_POST['preco'], "imgs/cardapio/queijo-full.jpg")) {
        header("Location: ../addProduct.php");
    }
}