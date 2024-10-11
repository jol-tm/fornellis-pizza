<?php
    include_once '../conn.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT COUNT(*) FROM cliente WHERE email = '$email'";

    if ($conn->query($sql) != 0) {
        echo "Logado!";
        header('Location: ../index.php');
    }
?>