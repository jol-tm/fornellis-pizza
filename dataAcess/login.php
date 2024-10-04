<?php 
    if (isset($_POST['emailLog']) && $_POST['passLog']) {
        $email = $_POST['emailLog'];
        $pass = $_POST['passLog'];
    }

    echo "Email para login: $email<br>";
    echo "Senha para login: $pass<br>";
?>