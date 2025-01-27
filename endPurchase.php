<?php
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("Location: index.php");
    }
    include "assets/header.php"; 
    include "classes/conn.php"; 
?>
<div class="box">
    <h1>Finalização de Compra</h1>
    <img src="imgs/logo-fornelli's.png" style="width: 40%">
    <h4 id="endPurchaseTimer">Sua compra vai ser finalizada em 20 segundos</h4>
    <div class="spinner-grow text-success" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
        <a href="checkout.php"><button id="cancelBtn">Cancelar</button></a>
    <?php
        $conn = new Conn();
        $pedido = new Pedido($conn->conectar());

        if (isset($_GET['purchase']) && $_GET['purchase'] == true ) {
            if ($pedido->endPurchase($_SESSION['userid'])) {
                header("purchaseHistory.php");
            }
        }
    ?>
</div>
<?php include "assets/footer.php"; ?>