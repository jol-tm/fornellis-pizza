<?php
    session_start();
    include_once "../classes/produto.php";
    include_once '../classes/conn.php';

    $conn = new Conn();
    $produto = new Produto($conn->conectar());

    if (isset($_POST['editProduct'])) {
        $dirPath = "imgs/cardapio/";
        $filePath = $dirPath . basename($_FILES['img']['name']);
    
        if (move_uploaded_file($_FILES['img']['tmp_name'], "../" . $filePath)) {
            if ($produto->editProduct($_POST['nome'], $_POST['categ'], $_POST['desc'], $_POST['preco'], $filePath, $_POST['editProduct'])) {
                header('Location: ../editMenu.php');
            }
        }

    } elseif (isset($_POST['deleteProduct'])) {
        if ($produto->deleteProduct($_POST['deleteProduct'])) {
            header('Location: ../editMenu.php');
        }
    }
?>