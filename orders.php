<?php include "assets/header.php"; ?>
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

            $order = "2x Marguerita <br> 1x Marshmellow";
            $tel = "(19) 12345-1234";
            $end = "Av. 2, 720";

            for ($i=0; $i < 5; $i++) { 
                echo "
                    <div class='item'>
                        <h4>$order</h4>
                        <h4>$tel</h4>
                        <h4>$end</h4>
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