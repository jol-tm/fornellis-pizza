<?php include "assets/header.php"; ?>
<div class="box">
    <form action="dataAcess/editAcc.php" method="post">
        <h1>Alterar Cadastro</h1>
        <input type="text" placeholder="Nome" name="nome" required>    
        <input type="email" placeholder="Email" name="email" required>    
        <input type="text" placeholder="Telefone" name="tel" required>    
        <input type="password" placeholder="Senha" name="pass" required>
        <input type="text" placeholder="Endereço para entregas" name="adress" required>
        <button type="submit" name="updateAcc"><h4>Salvar</h4></button>
        <button type="submit" id="deleteAcc" name="deleteAcc"><h4><img src="imgs/icones/delete-account-svg.svg" alt="">Excluir Conta</h4></button>
    </form>
</div>
<?php include "assets/footer.php"; ?>