<?php include "assets/header.php"; ?>
<div id="checkoutpadding" class="box">
    <h1>Carrinho</h1>
    <div class="topo">
        <h2>Produto</h2>
        <h2>Quantidade</h2>
        <h2>Preço</h2>
    </div>
    <div id="itens">
        <?php

            $imgPath = 'imgs/cardapio/bombom.jpg';
            $nameProd = "Bombom";
            $amt = "3";
            $price = '50,00';

            for ($i=0; $i < 5; $i++) { 
                echo "
                    <div class='item'>
                        <img class='imgProd' height='100' src='$imgPath' alt=''>
                        <h3>$nameProd</h3>
                        <div class='units'>
                            <a href=''>+</a>
                            <div class='number'>$amt</div>
                            <a href=''>-</a>
                        </div>
                        <h4 class='price'>R$$price</h4>
                    </div>
                "; 
            }
            
        ?>
    </div>
    <footer id="total">
        Total: <br>R$
        <form action="endPurchase.php" method="post">
            <button type="submit">Comprar</button>
        </form>
    </footer id="total">
</div>
<?php include "assets/footer.php"; ?>