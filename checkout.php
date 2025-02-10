<?php
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("Location: index.php");
    }
    include_once "assets/header.php"; 
    include_once "classes/conn.php"; 
?>
<div id="checkoutpadding" class="box">
    <h1>Carrinho</h1>
    <div class="topo">
        <h2>Produto</h2>
        <h2>Quantidade</h2>
        <h2>Preço</h2>
    </div>
    <div id="itens">
        <?php
            $conn = new Conn();
            $pedido = new Pedido($conn->conectar());
            $pedidos = $pedido->listOrder($_SESSION['userid']);
            if ($pedidos) {
                foreach ($pedidos as $item) {
                    echo "
                        <div class='item'>
                            <img class='imgProd' height='100' src='" . $item['imagem']. "' alt=''>
                            <h3>" . $item['nome'] . "</h3>
                            <div class='units'>
                                <a href='dataAcess/changeAmt.php?idCliente={$_SESSION['userid']}&id={$item['idProduto']}&act=add'>+</a>
                                <div class='number'>" . $item['quantidade'] . "</div>
                                <a href='dataAcess/changeAmt.php?idCliente={$_SESSION['userid']}&id={$item['idProduto']}&act=sub'>-</a>
                            </div>
                            <h4 class='price'>R$" . str_replace('.', ',', $item['preco_unitario']) . "</h4>
                        </div>
                    "; 
                }
            } else {
                echo "";
            }
        ?>
    </div>
    <footer id="total">
        Total:<br>R$ 
        <?php
            $pedido = new Pedido($conn->conectar());
            if ($pedidos) {

                echo str_replace('.', ',', $pedido->getTotalPrice($_SESSION['userid']));
                echo '        
                    <form action="endPurchase.php" method="post">
                        <button type="submit" name="buy">Comprar</button>
                    </form>
                ';
            } else {
                echo "00,00";
            }
        ?>
    </footer>
</div>
<?php include_once "assets/footer.php"; ?>