<?php
    include_once 'conn.php';

    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (email, pass) VALUES ('$email', '$pass')";
    if ($conn->query($sql)) {
        echo "Logado!";
        header('Location: ../index.php');
    }
?>