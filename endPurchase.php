<?php
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("Location: index.php");
    }
    include_once "assets/header.php"; 
    include_once "classes/conn.php"; 
?>
<div class="box">
    <h1>Finalização de Compra</h1>
    <img src="imgs/logo-fornelli's.png" width="30%">
    <h4 id="endPurchaseTimer">Sua compra vai ser finalizada em 20 segundos</h4>
    <div class="progress w-50" role="progressbar" aria-valuemin="0" aria-valuemax="100">
        <div id="progressBar" class="progress-bar bg-success" style="width: 100%"></div>
    </div>
    <p>A Fornelli's Pizza agradece a preferência!</p>
        <a href="checkout.php"><button id="cancelBtn">Cancelar</button></a>
    <?php
        $conn = new Conn();
        $pedido = new Pedido($conn->conectar());

        if (isset($_GET['purchase']) && $_GET['purchase'] == true ) {
            if ($pedido->endPurchase($_SESSION['userid'])) {
                echo '<script type="text/javascript">window.location.href = "purchaseHistory.php";</script>';
            }
        }
    ?>
</div>
<?php include_once "assets/footer.php"; ?>