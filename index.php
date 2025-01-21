<?php 
    session_start();
    include_once "assets/header.php";
    include_once "classes/conn.php";
    
    $conn = new Conn();
    
    if (isset($_POST['product']) && isset($_SESSION['userid'])) {
        $pedido = new Pedido($conn->conectar());
        if ($pedido->addProduct($_POST['product'], $_SESSION['userid'])) {
            echo "<div class='notification'>Adicionado ao carrinho!</div>";
        } 
    } elseif (!isset($_SESSION['userid']))  {
        echo "<div class='notification'>Você tem que estar logado!</div>";
    }
?>
    <!--CAROUSEL-->
    <div id="carousel" class="carousel slide carousel-css" data-bs-ride="carousel">
        <div class="carousel-inner carousel-inner-css">
            <div class="carousel-text">
                <div class="texts">
                    <p>Bem-vindo à Fornelli: onde a tradição italiana se encontra com o calor brasileiro em cada fatia.</p>
                    <p>TRADIÇÃO DESDE 1976</p>
                </div>
            </div>
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="imgs/carrosel/img1-carrosel.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="imgs/carrosel/img2-carrosel.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="imgs/carrosel/img3-carrosel.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    <!--FIM CAROUSEL-->
    <!--LINHA-->
    <div id="menu-section" class="div-line">
        <hr><img src="imgs/icones/pizza-icon.svg" alt=""><hr>
    </div>
    <!--FIM LINHA-->
    <!--CARDÁPIO-->
    <section id="menu" class="box" data-aos="fade-up" data-aos-offset="150">
        <h2>Cardápio</h2>
        <div class="menu-nav">
            <h4 id="Salgadas" class="menu-nav-btns">Salgadas</h4>
            <h4 id="Doces" class="menu-nav-btns">Doces</h4>
            <h4 id="Bebidas" class="menu-nav-btns">Bebidas</h4>
            <span id="placeholder"></span>
        </div>
        <div id="menu-cards-box">
            <div id="salty-menu" class="row justify-content-center">
                <?php
                    $produto = new Produto($conn->conectar());
                    foreach ($produto->listProducts("salgada") as $row) {
                        echo "
                            <div class='col-xl-4 col-md-6'>
                                <div class='menu-card'>
                                    <img class='img-fluid' src='" . $row["imagem"] . "'>
                                    <h4>" . $row["nome"] . "</h4>
                                    <h5>R$" . str_replace('.', ',', $row["preco"]) . "</h5>
                                    <form style='z-index: 1;' action='index.php'method='post'>
                                        <button class='addToCartBtn' type='submit' name='product' value='" . $row["id"] . "'><img src='imgs/icones/addProduct.svg'></button>
                                    </form>
                                    <div class='item-descriptor'><p>" . $row["descricao"] . "</p></div>
                                </div>
                            </div>";
                    }
                ?>
            </div>
            <div id="sweet-menu" class="row justify-content-center">
                <?php
                    foreach ($produto->listProducts("doce") as $row) {
                        echo "
                            <div class='col-xl-4 col-md-6'>
                                <div class='menu-card'>
                                    <img class='img-fluid' src='" . $row["imagem"] . "'>
                                    <h4>" . $row["nome"] . "</h4>
                                    <h5>R$" . str_replace('.', ',', $row["preco"]) . "</h5>
                                    <form style='z-index: 1;' action='index.php'method='post'>
                                        <button class='addToCartBtn' type='submit' name='product' value='" . $row["id"] . "'><img src='imgs/icones/addProduct.svg'></button>
                                    </form>
                                    <div class='item-descriptor'><p>" . $row["descricao"] . "</p></div>
                                </div>
                            </div>";
                    }
                ?>
            </div>
            <div id="drinks-menu" class="row justify-content-center">
                <?php
                    $produto->listProducts("bebida");
                    foreach ($produto->listProducts("bebida") as $row) {
                        echo "
                            <div class='col-xl-4 col-md-6'>
                                <div class='menu-card'>
                                    <img class='img-fluid' src='" . $row["imagem"] . "'>
                                    <h4>" . $row["nome"] . "</h4>
                                    <h5>R$" . str_replace('.', ',', $row["preco"]) . "</h5>
                                    <form style='z-index: 1;' action='index.php'method='post'>
                                        <button class='addToCartBtn' type='submit' name='product' value='" . $row["id"] . "'><img src='imgs/icones/addProduct.svg'></button>
                                    </form>
                                    <div class='item-descriptor'><p>" . $row["descricao"] . "</p></div>
                                </div>
                            </div>";
                    }
                ?>
            </div>
        </div>
    </section>
    <!--FIM CARDÁPIO-->
    <!--LINHA-->
    <div id="contact-section" class="div-line">
        <hr><img src="imgs/icones/pizza-icon.svg" alt=""><hr>
    </div>
    <!--FIM LINHA-->
    <!--CONTATO-->
    <section id="contact" class="box" data-aos="fade-up" data-aos-offset="150">
        <h2>Contato</h2>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-item box">
                    <img src="imgs/icones/wpp.svg" alt="">
                    <h4>(19) 92133-3332</h4>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="contact-item box">
                    <img src="imgs/icones/endr.svg" alt="">
                    <h4>Av. 10, N°3094<br>Centro - Rio Claro SP</h4>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 ctt-link">
                <a href="https://www.instagram.com/" target="_blank" >
                    <div class="contact-item box">
                        <img src="imgs/icones/ig.svg" alt="">
                        <h4>@fornellispizza</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-12 ctt-link">
                <a href="https://www.facebook.com/?locale=pt_BR" target="_blank" >
                    <div class="contact-item box"> 
                        <img src="imgs/icones/fcbk.svg" alt="">
                        <h4>@fornellispizza</h4>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!--FIM CONTATO-->
    <!--LINHA-->
    <div id="about-section" class="div-line">
        <hr><img src="imgs/icones/pizza-icon.svg" alt=""><hr>
    </div>
    <!--FIM LINHA-->
    <!--SOBRE-->
    <section id="about" class="box" data-aos="fade-up" data-aos-offset="150">
        <h2>Sobre</h2>
        <p>Nossa jornada começou há décadas, quando um grupo de amigos apaixonados pela culinária italiana decidiu trazer para Rio Claro o segredo de uma pizza perfeita. Com amor, trabalho árduo e uma pitada de nostalgia, eles transformaram um pequeno espaço em um santuário da culinária italiana: a Fornelli's.</p>
        <p>Nossa paixão pela pizza atravessa gerações. Desde os primeiros dias, quando começamos a preparar a massa, até hoje, cada pizza que sai dos nossos fornos conta uma história de dedicação, qualidade e autenticidade. Mas mais do que apenas pizza, na Fornelli você encontra um lar. Somos um ponto de encontro para amigos que se reúnem para celebrar a vida, para famílias que compartilham uma refeição e para casais que brindam ao amor.</p>
        <p>Nosso compromisso com a qualidade e a hospitalidade é o que nos diferencia. Quando você entra na Fornelli, não é apenas um cliente; é parte da nossa história. Nossa mesa está sempre posta para recebê-lo com um sorriso caloroso e uma fatia generosa de pizza. Então, venha se juntar a nós na Fornelli, onde a comida é boa, as risadas são contagiantes e as memórias são feitas a cada mordida. Afinal, aqui, você não está apenas comendo pizza, você está vivendo a experiência italiana no coração de Rio Claro. <strong><em>Buon appetito!</em></strong></p>
    </section>
<?php include "assets/footer.php"; ?>

