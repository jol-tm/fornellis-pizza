<?php 
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("Location: index.php");
    }
    include "assets/header.php"; 
?>
<div class="box">
    <form action="dataAcess/editAcc.php" method="post">
        <h1>Alterar Cadastro</h1>
        <input type="text" placeholder="Nome" name="nome" value='<?php echo $_SESSION['userno']; ?>' required>    
        <input type="email" placeholder="Email" name="email" value='<?php echo $_SESSION['userem']; ?>' required>    
        <input type="text" placeholder="Telefone" name="tel" value='<?php echo $_SESSION['usernu']; ?>' required>    
        <input type="password" placeholder="Senha" name="pass" value='<?php echo $_SESSION['userse']; ?>' required>
        <input type="text" placeholder="Endereço para entregas" name="adress" value='<?php echo $_SESSION['useren']; ?>' required>
        <button type="submit" name="updateAcc"><h4>Salvar</h4></button>
        <button type="submit" id="deleteAcc" name="deleteAcc"><h4><img src="imgs/icones/delete-account-svg.svg" alt="">Excluir Conta</h4></button>
    </form>
</div>
<?php include "assets/footer.php"; ?>