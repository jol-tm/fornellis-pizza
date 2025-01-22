<?php 
    include "assets/header.php"; 
    include "classes/conn.php"; 

    $conn = new Conn();
    $pedido = new Pedido($conn->conectar());
    $pedidos = $pedido->listAllOrders();
?>
<div id="checkoutpadding" class="box">
    <h1>Pedidos</h1>
    <div class="topo topoOrders">
        <h2>Pedido</h2>
        <h2>Telefone</h2>
        <h2>Endereço</h2>
        <h2>Controlar</h2>
    </div>
    <div id="itens">
        <?php
            foreach ($pedidos as $item) {
                echo "
                    <div class='item'>
                        <h4 class='itemCol'>{$item['nome']} x {$item['quantidade']}</h4>
                        <h4 class='itemCol'>{$item['numero']}</h4>
                        <h4 class='itemCol'>{$item['endereco']}</h4>
                        <form id='controlOrder' action='' method='post'>
                            <button type='submit' id='acceptBtn' value='accept'><img src='imgs/icones/accept.svg' alt=''></button>
                            <button type='submit' id='denyBtn' value='deny'><img height=24 src='imgs/icones/close-nav.svg' alt=''></button>
                        </form>                        
                    </div>
                "; 
            }
        ?>
    </div>
</div>
<?php include "assets/footer.php"; ?>