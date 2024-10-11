<?php 
    include_once '../conn.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $pass = $_POST['pass'];
    $adr = $_POST['adress'];
    
    $check = "SELECT COUNT(*) FROM cliente WHERE email = '$email'";
    
    if (!$conn->query($check)) {
        $insert = "INSERT INTO usuarios (nome, email, tel, pass, adress ) VALUES ('$nome', '$email', '$tel', '$pass', '$adr')";
        if ($conn->query($insert)) {
            echo "Cadastrado com sucesso! :D";
            header('Location: ../index.php');
        };
    } else {
        echo "Usuário já cadastrado";
    }
?>