<?php 
    include "assets/header.php"; 
    include "classes/conn.php"; 

    $conn = new Conn();
    $pedido = new Pedido($conn->conectar());
    $pedidos = $pedido->listAllOrders();
    print_r($pedidos);
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
            foreach ($pedidos as $index => $item) {
                $itens = "{$item['nome']} x {$item['quantidade']}";

                if ($index > 0) {
                    $itemAnterior = $pedidos[$index - 1];
    
                    if ($item['idCliente'] == $itemAnterior['idCliente']) {
                        $itens = $itemAnterior['nome'] /*qtd*/ . "<br>" . $item['nome'];
                    }
                }

                echo "
                    <div class='item'>
                        <h4 class='itemCol'>$itens</h4>
                        <h4 class='itemCol'>{$item['numero']}</h4>
                        <h4 class='itemCol'>{$item['endereco']}</h4>
                        <input type='hidden' name='idCliente' value='{$item['idCliente']}'></input>
                        <form id='controlOrder' action='dataAcess/manageOrder.php' method='post'>
                            <button type='submit' id='acceptBtn' name='accept'><img src='imgs/icones/accept.svg' alt=''></button>
                            <button type='submit' id='denyBtn' name='deny'><img height=24 src='imgs/icones/close-nav.svg' alt=''></button>
                        </form>                        
                    </div>
                "; 
            }
        ?>
    </div>
</div>
<?php include "assets/footer.php"; ?>