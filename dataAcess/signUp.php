<?php 
    include_once 'conn.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $pass = $_POST['pass'];
    $adr = $_POST['adress'];
    
    $conn->query($sql);
    $sql = "INSERT INTO usuarios (nome, email, tel, pass, adress ) VALUES ('$nome', '$email', '$tel', '$pass', '$adr')";

?>