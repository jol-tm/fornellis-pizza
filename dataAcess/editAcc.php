<?php

    include_once 'conn.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $senha = password_hash($_POST['pass'], PASSWORD_DEFAULT)$;
    $end = $_POST['adress'];

    if (isset($_POST[ 'deleteAcc'])) {
        $sql = "DELETE FROM cliente WHERE id = " . $_SESSION['user'];
        if ($conn->query($sql)) {
            echo 'Sucesso ao deletar sua conta! :D';
        }
    } else {
        $sql = "UPDATE cliente SET nome = '$nome', email = '$email', numero = '$tel', 'senha' = $senha, endereco = '$end' WHERE id = " . $_SESSION['user'];
        if ($conn->query($sql)) {
            echo 'Sucesso ao atualizar sua conta! :D';
            header('Location: ../changeRegistration.php');
        }
    }
?>