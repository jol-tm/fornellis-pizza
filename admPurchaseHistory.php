<?php
    include_once "admin.php";
    session_start();
    if ($_SESSION['userem'] != "admin@fornellis.com") {
        header("Location: index.php");
    }
    include_once "classes/conn.php"; 
    include_once "assets/header.php"; 

    $conn = new Conn();
    $pedido = new Pedido($conn->conectar());
    $history = $pedido->listAllHistory();
?>
<div class="box">
    <h1>Histórico Pedidos</h1>
    <div class="topo">
      <h2>Pedido</h2>
      <h2>Tel. Cli.</h2>
      <h2>Conteúdo</h2>
      <h2>Data</h2>
      <h2>Status</h2>
      <h2>Valor</h2>
    </div>
      <div id="itens">
        <?php
            foreach ($history as $item) {
                echo "
                    <div class=\"item\">
                      <div class=\"espacamento historyAdmItem\">{$item['id']}</div>
                      <div class=\"espacamento historyAdmItem\">{$item['numero']}</div>
                      <div class=\"espacamento historyAdmItem\">{$item['nome']} x {$item['quantidade']}</div>
                      <div class=\"espacamento historyAdmItem\">" . str_replace("-", "/", $item["dataPedido"]) . "</div>
                      <div class=\"espacamento historyAdmItem status\">{$item["status"]}</div>
                      <div class=\"espacamento historyAdmItem\">R$ {$item["valor_total"]}</div>
                    </div>
                ";
            }
        ?>
    </div>
</div>
<?php
    include_once "assets/footer.php";
?>