<?php 
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("Location: index.php");
    }
    if (isset($_SESSION['status'])) {
        echo "<div class='notification'>{$_SESSION['status']}</div>";
        unset($_SESSION['status']);
    }
    include_once "assets/header.php"; 
    include_once "admin.php"; 
?>
<div class="box">
    <?php
        if ($_SESSION['userem'] == $admin) {
            echo "
                <form action='dataAcess/editAcc.php' method='post'>
                    <h1>Alterar Cadastro</h1>
                    <input type='text' placeholder='Nome' name='nome' value=" . $_SESSION['userno'] . " required>   
                    <input type='password' placeholder='Nova senha' name='pass' value=''>
                    <button type='submit' name='updateAcc'><h4>Salvar</h4></button>
                </form>
            ";
        } else {
            echo "
                <form action='dataAcess/editAcc.php' method='post'>
                    <h1>Alterar Cadastro</h1>
                    <input type='text' placeholder='Nome' name='nome' value='" . $_SESSION['userno'] . "' required>   
                    <input type='email' placeholder='Email' name='email' value='" . $_SESSION['userem'] . "' required>    
                    <input type='text' placeholder='Telefone' name='tel' value='" . $_SESSION['usernu'] . "' required>    
                    <input type='password' placeholder='Nova senha' name='pass' value=''>
                    <input type='text' placeholder='Endereço para entregas' name='adress' value='" . $_SESSION['useren'] . "' required>
                    <button type='submit' name='updateAcc'><h4>Salvar</h4></button>
                    <button type='button' id='deleteAccBtn' class='deleteAcc'><h4><img src='imgs/icones/delete-account-svg.svg' alt=''>Excluir Conta</h4></button>
                    <div id='deleteAccConfirmation' class='pop-up'>
                        <h4>Você tem certeza? Todos seus dados serão apagados, não sendo possível reverter essa operação. Pense bem.</h4>
                        <button type='submit' class='deleteAcc' name='deleteAcc'><h4>EXCLUIR</h4></button>
                        <button type='button' id='cancel'><h4>Cancelar</h4></button>
                    </div>
                </form>
            ";
        }
        ?>
</div>
<?php include_once "assets/footer.php"; ?>