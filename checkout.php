<?php
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("Location: index.php");
    }
    include "assets/header.php"; 
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
            $pedido = new Pedido();
            $pedidos = $pedido->listOrder($_SESSION['userid']);
            foreach ($pedidos as $item) {
                echo "
                    <div class='item'>
                        <img class='imgProd' height='100' src='" . $item['imagem']. "' alt=''>
                        <h3>" . $item['nome'] . "</h3>
                        <div class='units'>
                            <a href='dataAcess/changeAmt.php?idCliente={$_SESSION['userid']}&id={$item['produtos']}&act=add'>+</a>
                            <div class='number'>" . $item['quant'] . "</div>
                            <a href='dataAcess/changeAmt.php?idCliente={$_SESSION['userid']}&id={$item['produtos']}&act=sub'>-</a>
                        </div>
                        <h4 class='price'>R$" . $item['preco'] . "</h4>
                    </div>
                "; 
            }
            
        ?>
    </div>
    <footer id="total">
        Total:<br>R$ <?php echo $pedido->calcTotalPrice($_SESSION['userid'])[0][0]; ?>
        <form action="endPurchase.php" method="post">
            <button type="submit">Comprar</button>
        </form>
    </footer id="total">
</div>
<?php include "assets/footer.php"; ?>