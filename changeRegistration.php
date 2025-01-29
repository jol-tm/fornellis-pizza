<?php 
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("Location: index.php");
    }
    include_once "assets/header.php"; 
    include_once "admin.php"; 
?>
<div class="box">
    <?php
        if ($_SESSION['userem'] == $admin) {
            $email = "hidden";
            $text = "hidden";
            $display = "none";
        } else {
            $email = "email";
            $text = "text";
            $display = "block";
        }

        ?>
    <form action='dataAcess/editAcc.php' method='post'>
        <h1>Alterar Cadastro</h1>
        <input type="text" placeholder='Nome' name='nome' value="<?php echo $_SESSION['userno']; ?>" required>   
        <input type="<?php echo $email; ?>" placeholder='Email' name='email' value="<?php echo $_SESSION['userem']; ?>" required>    
        <input type="<?php echo $text; ?>" placeholder='Telefone' name='tel' value="<?php echo $_SESSION['usernu']; ?>" required>    
        <input type='password' placeholder='Nova senha' name='pass' value="">
        <input type="<?php echo $text; ?>" placeholder='Endereço para entregas' name='adress' value="<?php echo $_SESSION['useren']; ?>" required>
        <button type='submit' name='updateAcc'><h4>Salvar</h4></button>
        <button style="<?php echo "display: $display"; ?>" type='submit' id='deleteAcc' name='deleteAcc'><h4><img src='imgs/icones/delete-account-svg.svg' alt=''>Excluir Conta</h4></button>
    </form>
</div>
<?php include_once "assets/footer.php"; ?>