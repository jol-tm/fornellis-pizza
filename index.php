<?php include "assets/header.php"; ?>
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
                <div class="col-xl-4 col-md-6">
                    <div id="marguerita" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/marguerita.jpg" alt="MARGUERITA">
                        <h4>Marguerita</h4>
                        <h5>R$59,90</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Tomate, mussarela e manjericão</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="frango-catupiry" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/Frango-com-catupiry.jpg" alt="FRANGO">
                        <h4>Frango com Catupiry</h4>
                        <h5>R$49,99</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="frango-catupiry"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Frango, catupiry, milho e azeitonas</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="4queijos" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/queijo-full.jpg" alt="QUEIJO">
                        <h4>Quatro Queijos</h4>
                        <h5>R$59,90</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="4queijos"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Queijo Mussarela, Parmesão, Gorgonzola e Provolone</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="calabresa" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/calabresa.jpg" alt="CALABRESA">
                        <h4>Calabresa</h4>
                        <h5>R$47,99</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Calabresa com Queijo</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="strogonoff-frango" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/strogonoff-de-frango.jpg" alt="STROGONOFF">
                        <h4>Strogonoff de frango</h4>
                        <h5>R$59,90</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Strogonoff de Frango, Queijo e Batata Palha </p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="pepperoni" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/pepperoni.jpg" alt="PEPPERONI">
                        <h4>Pepperoni</h4>
                        <h5>R$49,99</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Pepperoni com Queijo</p></div>
                    </div>
                </div>
            </div>
            <div id="sweet-menu" class="row justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div id="bombom" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/bombom.jpg" alt="BOMBOM">
                        <h4>Bombom</h4>
                        <h5>R$49,90</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Chocolate, Chocolate Branco, Confetes e Bombons </p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="choc-gran" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/chocolate-granulado.jpg" alt="CHOCOLATE-GRANULADO">
                        <h4>Chocolate com Granulado</h4>
                        <h5>R$49,90</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Chocolate com Granulados, Contornados por Avelã e Cerejas</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="gotas-choc" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/gotas-chocolate.jpg" alt="GOTAS">
                        <h4>Gotas de Chocolate</h4>
                        <h5>R$49,90</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Chocolate com Gotas</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="mm" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/M&M.jpg" alt="M&M">
                        <h4>M&M</h4>
                        <h5>R$55,90</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Chocolate com M&M&#39;s e Cobertura de Morango</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="marshmellow" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/Marshmello.jpg" alt="MARSHMELLOW">
                        <h4>Marshmellow</h4>
                        <h5>R$55,90</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Marshmellow Tostados com Morango</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="morango" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/morango.jpg" alt="MORANGO">
                        <h4>Morango</h4>
                        <h5>R$49,99</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Chocolate e Morangos cobertos com Leite em Pó</p></div>
                    </div>
                </div>
            </div>
            <div id="drinks-menu" class="row justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div id="coca" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/coca.jpg" alt="COCA-COLA">
                        <h4>Coca Cola</h4>
                        <h5>R$7,00</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Coca Cola KS 290ml</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="pepsi" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/pepsi-lata.jpg" alt="PEPSI">
                        <h4>Pepsi</h4>
                        <h5>R$5,99</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Pepsi lata 269ml</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="sprite" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/sprite-lata.jpg" alt="SPRITE">
                        <h4>Sprite</h4>
                        <h5>R$5,00</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Sprite Lata 220ml</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="guarana" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/guarana.jpg" alt="GUARANA">
                        <h4>Guaraná</h4>
                        <h5>R$6,00</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Guaraná Lata 350ml</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="laranja" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/laranja.jpg" alt="SUCO-DE-LARANJA">
                        <h4>Suco de Laranja</h4>
                        <h5>R$14,99</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Suco Natural de Laranja 500ml</p></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div id="maracuja" class="menu-card">
                        <img class="img-fluid" src="imgs/cardapio/maracuja.jpg" alt="SUCO-DE-MARACUJA">
                        <h4>Suco de Maracujá</h4>
                        <h5>R$14,99</h5>
                        <form style="z-index: 1;" action="index.php" method="post">
                            <button class="addToCartBtn" type="submit" name="marguerita"><img src="imgs/icones/addProduct.svg" alt=""></button>
                        </form>
                        <div class="item-descriptor"><p>Suco Natural de Maracujá 500ml</p></div>
                    </div>
                </div>
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

