<?php 
    $nome = $_POST['nomeSignUp'];
    $email = $_POST['emailSignUp'];
    $tel = $_POST['telSignUp'];
    $pass = $_POST['passSignUp'];
    $adr = $_POST['adressSignUp'];

    

    echo "Nome para cadastro: $nome<br>";
    echo "Email para cadastro: $email<br>";
    echo "Tel para cadastro: $tel<br>";
    echo "Senha para cadastro: $pass<br>";
    echo "End para cadastro: $adr<br>";
?>