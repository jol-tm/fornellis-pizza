<?php include "assets/header.php"; ?>
<div class="box">
    <form action="dataAcess/signUp.php" method="post">
        <h1>Alterar Cadastro</h1>
        <input type="text" placeholder="Nome" name="nomeSignUp" required>    
        <input type="email" placeholder="Email" name="emailSignUp" required>    
        <input type="text" placeholder="Telefone" name="telSignUp" required>    
        <input type="password" placeholder="Senha" name="passSignUp" required>
        <input type="text" placeholder="Endereço para entregas" name="adressSignUp" required>
        <button type="submit" value="updateAcc"><h4>Salvar</h4></button>
        <button type="submit" id="deleteAcc" value="deleteAcc"><h4><img src="imgs/icones/delete-account-svg.svg" alt="">Excluir Conta</h4></button>
    </form>
</div>
<?php include "assets/footer.php"; ?>