<?php
    include_once "classes/produto.php";
    include_once "classes/pedido.php";
    include_once "classes/cliente.php";
    include_once "admin.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornelli's Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="shortcut icon" href="imgs/favicon.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="scripts/main.js"></script>
    <noscript>É necessário permitir JavaScript para o website funcionar corretamente</noscript>
</head>
<body>
    <div id='loadingScreen'>
        <img id='loadingScreenImg' width=150 src="imgs/logo-fornelli's.png" alt='Logo'>
        <h1>Fornelli's Pizza</h1>
        <div class='spinner-grow text-success' role='status'>
            <span class='visually-hidden'>Loading...</span>
        </div>
    </div>
    <!--TELA LOGIN/CADASTRO-->
    <div class="pop-up-box">
        <div id="login-menu" class="pop-up">
            <?php
                if (isset($_SESSION['userid']) && $_SESSION['userem'] != $admin) {
                    echo "
                        <div id=\"userOptionsBox\">
                            <h2>Olá, {$_SESSION['userno']}!</h2>
                            <a class=\"userOptions\" href=\"checkout.php\"><img height=\"42\" src=\"imgs/icones/shoppingCart.svg\">Carrinho</a>
                            <a class=\"userOptions\" href=\"purchaseHistory.php\"><img height=\"42\" src=\"imgs/icones/purchaseHistory.svg\">Histórico de Compras</a>
                            <a class=\"userOptions\" href=\"changeRegistration.php\"><img height=\"42\" src=\"imgs/icones/changeRegistration.svg\">Alterar Cadastro</a>
                            <a href=\"dataAcess/logOff.php\" class=\"logOff\"><img height=\"32\" src=\"imgs/icones/logOff.svg\">Sair da Conta</a>
                        </div>
                    ";
                } else if (isset($_SESSION['userid']) && $_SESSION['userem'] == $admin) {
                    echo "
                        <div id=\"userOptionsBox\">
                            <h2>Olá, {$_SESSION['userno']}!</h2>
                            <a class=\"userOptions\" href=\"orders.php\"><img height=\"42\" src=\"imgs/icones/orders.svg\">Pedidos</a>
                            <a class=\"userOptions\" href=\"admPurchaseHistory.php\"><img height=\"42\" src=\"imgs/icones/purchaseHistory.svg\">Histórico de Pedidos</a>
                            <a class=\"userOptions\" href=\"editMenu.php\"><img height=\"42\" src=\"imgs/icones/editMenu.svg\">Gerenciar Cardápio</a>
                            <a class=\"userOptions\" href=\"changeRegistration.php\"><img height=\"42\" src=\"imgs/icones/changeRegistration.svg\">Alterar Cadastro</a>
                            <a href=\"dataAcess/logOff.php\" class=\"logOff\"><img height=\"32\" src=\"imgs/icones/logOff.svg\">Sair da Conta</a>
                        </div>
                    ";
                } else {
                    echo "
                    <form action=\"dataAcess/login.php\" method=\"post\">
                        <h1>Login</h1>
                        <input type=\"email\" placeholder=\"Email\" name=\"email\" required>    
                        <input type=\"password\" placeholder=\"Senha\" name=\"pass\" required>
                        <button type=\"submit\"><h4>Entrar</h4></button>
                        <h5 id=\"sign-up-link\">Não tem uma conta? Cadastre-se aqui!</h5>
                    </form>
                    ";
                }
            ?>
            <button class="hide-user-menu"><img src="imgs/icones/close-nav.svg" alt=""></button>

        </div>
        <div id="sign-up-menu" class="pop-up">
            <button class="hide-user-menu"><img src="imgs/icones/close-nav.svg" alt=""></button>
            <form action="dataAcess/signUp.php" method="post">
                <h1>Cadastre-se</h1>
                <input type="text" placeholder="Nome" name="nome" required>    
                <input type="email" placeholder="Email" name="email" required>    
                <input type="text" placeholder="Telefone" name="tel" required>    
                <input type="password" placeholder="Senha" name="pass" required>
                <input type="text" placeholder="Endereço para entregas" name="adress" required>
                <button type="submit"><h4>Cadastrar</h4></button>
            </form>
        </div>
    </div>
    <!--FIM TELA LOGIN/CADASTRO-->
    <!--BARRA NAVEGAÇÃO-->
    <nav class="navbar navbar-expand-lg nav-css">
        <a href="index.php#top" id="logo"><img id="logo-img" src="imgs/logo-fornelli's.png" alt="Logo"></a>
        <!--BTN NAVBAR-->
        <button id="nav-btn" class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="margin: 1rem;">
            <img src="imgs/icones/menu.svg" alt="">
        </button>
        <!--FIM BTN NAVBAR-->
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav navbar-css">
                <li class="nav-item m-auto nav-item-css">    
                    <a class="nav-link nav-link-css" href="index.php#menu-section">Cardápio</a>
                </li>
                <li class="nav-item m-auto nav-item-css">
                    <a class="nav-link nav-link-css" href="index.php#contact-section">Contato</a>
                </li>
                <li class="nav-item m-auto nav-item-css">
                    <a class="nav-link nav-link-css" href="index.php#about-section">Sobre</a>
                </li>
                <li class="m-auto" id="user-icon-item">
                    <img class="nav-item-css" id="user-icon" src="imgs/icones/user.svg" alt="">
                </li>
            </ul>
        </div>
    </nav>
    <!--FIM BARRA NAVEGAÇÃO-->