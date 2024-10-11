<?php
    include_once 'conn.php';

    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    echo "<h2>Email: $email</h2>";
    echo "<h2>Senha: $pass</h2>";

    // $sql = "INSERT INTO usuarios (email, pass) VALUES ('$email', '$pass')";
    // $conn->query($sql);
?>