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
    $pedidos = $pedido->listAllOrders();
?>
<div id="checkoutpadding" class="box">
    <h1>Pedidos</h1>
    <div class="topo">
        <h2>Pedido</h2>
        <h2>Telefone</h2>
        <h2>Endereço</h2>
        <h2>Controlar</h2>
    </div>
    <div id="itens">
        <?php
            /* foreach ($pedidos as $item) {
                echo "
                    <div class='item'>
                        <h4 class='itemCol content'>{$item['nome']} x {$item['quantidade']}</h4>
                        <h4 class='itemCol'>{$item['numero']}</h4>
                        <h4 class='itemCol'>{$item['endereco']}</h4>
                        <form id='controlOrder' action='dataAcess/manageOrder.php' method='post'>
                            <input type='hidden' name='idCliente' value='{$item['idCliente']}'></input>
                            <button type='submit' id='acceptBtn' name='accept'><img src='imgs/icones/accept.svg' alt=''></button>
                            <button type='submit' id='denyBtn' name='deny'><img height=24 src='imgs/icones/close-nav.svg' alt=''></button>
                        </form>                        
                    </div>
                    ";
            }*/
        ?>
    </div>
</div>
<?php include_once "assets/footer.php"; ?>