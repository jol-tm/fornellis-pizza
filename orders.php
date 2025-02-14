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
        <h2>Valor</h2>
        <h2>Telefone</h2>
        <h2>Endereço</h2>
        <h2>Controlar</h2>
    </div>
    <div id="itens"></div>
</div>
<?php include_once "assets/footer.php"; ?>