<?php 
  include_once "assets/header.php"; 
  include_once "classes/produto.php"; 
  include_once "classes/conn.php";
?>
<div class="box">
    <h1>Gerenciar Cardápio</h1>
    <a href="addProduct.php" id="addProduct">Adicionar Produto</a>
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
          $conn = new Conn();
          $produto = new Produto($conn->conectar());
          $sal = $produto->listProducts('Salgada');
          $doce = $produto->listProducts('Doce');
          $bebida = $produto->listProducts('Bebida');

          foreach ($sal as $item) {
            $status = setSelected($item['categoria']);
            echo "
                <tr>
                <form id='controlOrder' action='dataAcess/updateMenu.php' method='post'>
                <th scope='row'><input class='inputEditMenu' type='file' name='img' value='{$item['imagem']}' id=''></th>
                    <td><input class='inputEditMenu' type='text' name='nome' value='{$item['nome']}'></input></td>
                    <td><select name='categ'>
                      <option value='Salgada' {$status[0]}>Salgada</option>
                      <option value='Doce' {$status[1]}>Doce</option>
                      <option value='Bebida' {$status[2]}>Bebida</option>
                    </select></td>
                    <td><input class='inputEditMenu' type='text' name='desc' value='{$item['descricao']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='preco' value='" . $item['preco'] . "'></input></td>
                    <td><button type='submit' name='editProduct' value='{$item['id']}' id='editBtn'><img src='imgs/icones/editProd.svg' alt=''></button></td>
                    <td><button type='submit' name='deleteProduct' value='{$item['id']}' id='removeBtn'><img height=24 src='imgs/icones/delete-account-svg.svg' alt=''></button></td>
                </form>
                </tr>
            "; 
          }

          foreach ($doce as $item) { 
            $status = setSelected($item['categoria']);
            echo "
                <tr>
                <form id='controlOrder' action='dataAcess/updateMenu.php' method='post'>
                <th scope='row'><input class='inputEditMenu' type='file' name='img' value='{$item['imagem']}' id=''></th>
                    <td><input class='inputEditMenu' type='text' name='nome' value='{$item['nome']}'></input></td>
                    <td><select name='categ'>
                      <option value='Salgada' {$status[0]}>Salgada</option>
                      <option value='Doce' {$status[1]}>Doce</option>
                      <option value='Bebida' {$status[2]}>Bebida</option>
                    </select></td>
                    <td><input class='inputEditMenu' type='text' name='desc' value='{$item['descricao']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='preco' value='" . $item['preco'] . "'></input></td>
                    <td><button type='submit' name='editProduct' value='{$item['id']}' id='editBtn'><img src='imgs/icones/editProd.svg' alt=''></button></td>
                    <td><button type='submit' name='deleteProduct' value='{$item['id']}' id='removeBtn'><img height=24 src='imgs/icones/delete-account-svg.svg' alt=''></button></td>
                </form>
                </tr>
            "; 
          }

          foreach ($bebida as $item) { 
            $status = setSelected($item['categoria']);
            echo "
                <tr>
                <form id='controlOrder' action='dataAcess/updateMenu.php' method='post'>
                <th scope='row'><input  class='inputEditMenu' type='file' name='img' value='{$item['imagem']}' id=''></th>
                    <td><input class='inputEditMenu' type='text' name='nome' value='{$item['nome']}'></input></td>
                    <td><select name='categ'>
                      <option value='Salgada' {$status[0]}>Salgada</option>
                      <option value='Doce' {$status[1]}>Doce</option>
                      <option value='Bebida' {$status[2]}>Bebida</option>
                    </select></td>
                    <td><input class='inputEditMenu' type='text' name='desc' value='{$item['descricao']}'></input></td>
                    <td><input class='inputEditMenu' type='text' name='preco' value='" . $item['preco'] . "'></input></td>
                    <td><button type='submit' name='editProduct' value='{$item['id']}' id='editBtn'><img src='imgs/icones/editProd.svg' alt=''></button></td>
                    <td><button type='submit' name='deleteProduct' value='{$item['id']}' id='removeBtn'><img height=24 src='imgs/icones/delete-account-svg.svg' alt=''></button></td>
                </form>
                </tr>
            "; 
          }

          function setSelected($categ) {
            $status = [];
            if ($categ == "Salgada") {
              $status[0] = "selected";
              $status[1] = "";
              $status[2] = "";
            } elseif ($categ == "Doce") {
              $status[0] = "";
              $status[1] = "selected";
              $status[2] = "";
            } elseif ($categ == "Bebida") {
              $status[0] = "";
              $status[1] = "";
              $status[2] = "selected";
            }
            return $status;
          }
        ?>
      </tbody>
    </table>
</div>
<?php include "assets/footer.php"; ?>