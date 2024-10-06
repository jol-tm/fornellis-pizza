<?php include "assets/header.php"; ?>
<div id="checkoutpadding" class="box">
    <h1>Carrinho</h1>
    <div class="topo">
        <h2>Produto</h2>
        <h2>Quantidade</h2>
        <h2>Preço</h2>
    </div>
    <div id="itens">
        <div class="item">
            <img class="imgProd" height="100" src="imgs\cardapio\calabresa.jpg" alt="">
            <h3>Calabresa</h3>
            <div class="units">
                <a href="" >+</a>
                <div class="number">1</div>
                <a href="" >-</a>
            </div>
            <h4 class="price">R$59,99</h4>
        </div>
        <div class="item">
            <img class="imgProd" height="100" src="imgs\cardapio\calabresa.jpg" alt="">
            <h3>Calabresa</h3>
            <div class="units">
                <a href="" >+</a>
                <div class="number">1</div>
                <a href="" >-</a>
            </div>
            <h4 class="price">R$59,99</h4>
        </div>
        <div class="item">
            <img class="imgProd" height="100" src="imgs\cardapio\calabresa.jpg" alt="">
            <h3>Calabresa</h3>
            <div class="units">
                <a href="" >+</a>
                <div class="number">1</div>
                <a href="" >-</a>
            </div>
            <h4 class="price">R$59,99</h4>
        </div>
    </div>
    <footer id="total">
        Total: <br>R$
        <form action="endPurchase.php" method="post">
            <button type="submit">Comprar</button>
        </form>
    </footer id="total">
</div>
<?php include "assets/footer.php"; ?>