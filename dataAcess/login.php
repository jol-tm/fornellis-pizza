<?php 
    include_once 'conn.php';

    if (isset($_POST['email']) && $_POST['pass']) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    }

    $conn->query($sql);
    $sql = "INSERT INTO usuarios (email, pass) VALUES ('$email', '$pass')";
?>