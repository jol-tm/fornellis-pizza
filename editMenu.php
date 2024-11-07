<?php 
  include "assets/header.php"; 
  include_once "classes/produto.php";
?>
<div class="box">
    <table class="table">
      <thead>
        <tr>
          <th>Imagem</th>
          <th>Nome</th>
          <th>Categoria</th>
          <th>Descrição</th>
          <th>Preço</th>
          <th>Editar</th>
          <th>Apagar</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $produto = new Produto();
          $sal = $produto->listProducts('Salgada');
          $doce = $produto->listProducts('Doce');
          $bebida = $produto->listProducts('Bebida');

          foreach ($sal as $item) { 
            echo "
                <tr>
                <form id='controlOrder' action='dataAcess/updateMenu.php' method='post'>
                <th scope='row'><input class='inputEditMenu' type='file' name='img' value='{$item['imagem']}' id=''></th>
                    <td><input class='inputEditMenu' type='text' name='nome' value='{$item['nome']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='categ' value='{$item['categoria']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='desc' value='{$item['descricao']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='preco' value='" . $item['preco'] . "'></input></td>
                    <td><button type='submit' name='editProduct' value='{$item['id']}' id='editBtn'><img src='imgs/icones/editProd.svg' alt=''></button></td>
                    <td><button type='submit' name='deleteProduct' value='{$item['id']}' id='removeBtn'><img height=24 src='imgs/icones/delete-account-svg.svg' alt=''></button></td>
                </form>
                </tr>
            "; 
          }

          foreach ($doce as $item) { 
            echo "
                <tr>
                <form id='controlOrder' action='dataAcess/updateMenu.php' method='post'>
                <th scope='row'><input class='inputEditMenu' type='file' name='img' value='{$item['imagem']}' id=''></th>
                    <td><input class='inputEditMenu' type='text' name='nome' value='{$item['nome']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='categ' value='{$item['categoria']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='desc' value='{$item['descricao']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='preco' value='" . $item['preco'] . "'></input></td>
                    <td><button type='submit' name='editProduct' value='{$item['id']}' id='editBtn'><img src='imgs/icones/editProd.svg' alt=''></button></td>
                    <td><button type='submit' name='deleteProduct' value='{$item['id']}' id='removeBtn'><img height=24 src='imgs/icones/delete-account-svg.svg' alt=''></button></td>
                </form>
                </tr>
            "; 
          }

          foreach ($bebida as $item) { 
            echo "
                <tr>
                <form id='controlOrder' action='dataAcess/updateMenu.php' method='post'>
                <th scope='row'><input  class='inputEditMenu' type='file' name='img' value='{$item['imagem']}' id=''></th>
                    <td><input class='inputEditMenu' type='text' name='nome' value='{$item['nome']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='categ' value='{$item['categoria']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='desc' value='{$item['descricao']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='preco' value='" . $item['preco'] . "'></input></td>
                    <td><button type='submit' name='editProduct' value='{$item['id']}' id='editBtn'><img src='imgs/icones/editProd.svg' alt=''></button></td>
                    <td><button type='submit' name='deleteProduct' value='{$item['id']}' id='removeBtn'><img height=24 src='imgs/icones/delete-account-svg.svg' alt=''></button></td>
                </form>
                </tr>
            "; 
          }
        ?>
      </tbody>
    </table>
    <div id="addProduct">Adicionar Produto</div>
</div>
<?php include "assets/footer.php"; ?>