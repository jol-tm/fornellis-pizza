<?php include "assets/header.php"; ?>
<div class="box">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Imagem</th>
          <th scope="col">Nome</th>
          <th scope="col">Categoria</th>
          <th scope="col">Descrição</th>
          <th scope="col">Preço</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php

            for ($i=0; $i < 5; $i++) { 
                echo "
                    <tr>
                    <form id='controlOrder' action='dataAcess/updateMenu.php' method='post'>
                    <th scope='row'><input style='width: 0;' type='file' name='img' id=''></th>
                        <td>Marguerita</td>
                        <td>Salgado</td>
                        <td>Tomate, mussarela e manjericão</td>
                        <td>R$59,90</td>
                        <td>
                            <button type='submit' name='editProduct' id='editBtn'><img src='imgs/icones/editProd.svg' alt=''></button>
                            <button type='submit' name='deleteProduct' id='removeBtn'><img height=24 src='imgs/icones/delete-account-svg.svg' alt=''></button>
                        </td>
                    </form>
                    </tr>
                "; 
            }

        ?>
        
      </tbody>
    </table>
</div>
<?php include "assets/footer.php"; ?>