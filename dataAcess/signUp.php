<?php 
    include_once 'conn.php';
    $nome = $_POST['nomeSignUp'];
    $email = $_POST['emailSignUp'];
    $tel = $_POST['telSignUp'];
    $pass = $_POST['passSignUp'];
    $adr = $_POST['adressSignUp'];
    
    $conn->query($sql);
    $sql = "INSERT INTO usuarios (email, password) VALUES ('$email', '$pass')";

?>