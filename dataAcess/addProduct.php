<?php
session_start();
include_once "../classes/produto.php";
include_once "../classes/conn.php";

$conn = new Conn();
$produto = new Produto($conn->conectar());

if (isset($_POST['nome'], $_POST['categ'], $_POST['desc'], $_POST['preco'], $_FILES['img'])) {
    $dirPath = "imgs/cardapio/";
    $filePath = $dirPath . basename($_FILES['img']['name']);
    if (move_uploaded_file($_FILES['img']['tmp_name'], "../" . $filePath)) {
        if ($produto->addProduct($_POST['nome'], $_POST['categ'], $_POST['desc'], $_POST['preco'], $filePath)) {
            $_SESSION['status'] = "Adicionado com sucesso!";
            header("Location: ../addProduct.php");
        } else {
            $_SESSION['status'] = "Erro ao adicionar!";
            header("Location: ../addProduct.php");
        }
    }
}