<?php 
  session_start();
  if (!isset($_SESSION['userid'])) {
    header("Location: index.php");
  }
  include_once "assets/header.php"; 
  include_once "classes/pedido.php"; 
  include_once "classes/conn.php";
  ?>
<div class="box">
  <h1>Histórico Pedidos</h1>
    <div class="topo">
      <h2>Código</h2>
      <h2>Pedido</h2>
      <h2>Data</h2>
      <h2>Valor Total</h2>
      <h2>Status</h2>
    </div>
      <div id="itens">
        <?php
            $conn = new Conn();
            $pedido = new pedido($conn->conectar());
            $userHistory = $pedido->listHistory($_SESSION["userid"]);
            foreach ($userHistory as $item) {
                echo "
                    <div class=\"item\">
                      <div class=\"espacamento\">{$item['id']}</div>
                      <div class=\"espacamento\">{$item['nome']} x {$item['quantidade']}</div>
                      <div class=\"espacamento\">" . str_replace("-", "/", $item["dataPedido"]) . "</div>
                      <div class=\"espacamento\">R$ " . str_replace(". ", ", ", $item["valor_total"]) . "</div>
                      <div class=\"espacamento status\">{$item["status"]}</div>
                    </div>
                ";
            }
        ?>
    </div>
</div>
<?php include_once "assets/footer.php"; ?>