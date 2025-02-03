<?php
    session_start();
    include_once "../classes/produto.php";
    include_once '../classes/conn.php';

    $conn = new Conn();
    $produto = new Produto($conn->conectar());

    if (isset($_POST['editProduct'])) {
        $dirPath = "imgs/cardapio/";
        $filePath = $dirPath . basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'], "../" . $filePath);
        
        if ($produto->editProduct($_POST['nome'], $_POST['categ'], $_POST['desc'], $_POST['preco'], $filePath, $_POST['editProduct'])) {
            $_SESSION['status'] = "Editado com sucesso!";
            header('Location: ../editMenu.php');
        } else {
            $_SESSION['status'] = "Erro ao editar!";
            header('Location: ../editMenu.php');
        }
    } elseif (isset($_POST['deleteProduct'])) {
        if ($produto->deleteProduct($_POST['deleteProduct'])) {
            $_SESSION['status'] = "Removido com sucesso!";
            header('Location: ../editMenu.php');
        } else {
            $_SESSION['status'] = "Erro ao remover!";
            header('Location: ../editMenu.php');
        }
    }
?>