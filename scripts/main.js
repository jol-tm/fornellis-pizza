$(document).ready(function() {
    $(document).on('scroll', checkscroll);
    $('#open-nav').on('click', toogleMenuIcon);
    $('#close-nav').on('click', toogleMenuIcon);
    $('.menu-nav-btns').on('click', changeMenu);
    $('.menu-card').on('mouseenter', showDescriptor);
    $('.menu-card').on('mouseleave', hideDescriptor);
    changeMenu();
    AOS.init();
    setTimeout(() => { AOS.refresh(); }, 1000);
});

function checkscroll() {
    let btn = $('#scroll-up-btn');
    let txt = $('.carousel-text');

    if (window.scrollY < 230) {
        txt.css('transform', 'translateY(0)');
        txt.css('opacity', 1);
        btn.css('bottom', '-3.5rem');
    } else if (window.scrollY < 4200) {
        btn.css('bottom', '1rem');
        txt.css('transform', 'translateY(-100px)');
        txt.css('opacity', 0);
    } else {
        btn.css('bottom', '3rem');
    }
}

function toogleMenuIcon() {
    let openBtn = $('#open-nav');
    let closeBtn = $('#close-nav');
    let menuBtn = $('#nav-btn');

    if (menuBtn.attr('aria-expanded') == 'true') {
        openBtn.css('scale', 0);
        closeBtn.css('scale', 1);
    } else {
        openBtn.css('scale', 1);
        closeBtn.css('scale', 0);
    }
}

function changeMenu() {
    let sal = (
            `<div class="col-xl-4 col-md-6">
                <div id="marguerita" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/marguerita.jpg" alt="MARGUERITA">
                    <h4>Marguerita</h4>
                    <h5>R$59,90</h5>
                    <div class="item-descriptor"><p>Tomate, mussarela e manjericão</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="frango-catupiry" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/Frango-com-catupiry.jpg" alt="FRANGO">
                    <h4>Frango com Catupiry</h4>
                    <h5>R$49,99</h5>
                    <div class="item-descriptor"><p>Frango, catupiry, milho e azeitonas</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="4queijos" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/queijo-full.jpg" alt="QUEIJO">
                    <h4>Quatro Queijos</h4>
                    <h5>R$59,90</h5>
                    <div class="item-descriptor"><p>Queijo Mussarela, Parmesão, Gorgonzola e Provolone</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="calabresa" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/calabresa.jpg" alt="CALABRESA">
                    <h4>Calabresa</h4>
                    <h5>R$47,99</h5>
                    <div class="item-descriptor"><p>Calabresa com Queijo</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="strogonoff-frango" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/strogonoff-de-frango.jpg" alt="STROGONOFF">
                    <h4>Strogonoff de frango</h4>
                    <h5>R$59,90</h5>
                    <div class="item-descriptor"><p>Strogonoff de Frango, Queijo e Batata Palha </p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="pepperoni" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/pepperoni.jpg" alt="PEPPERONI">
                    <h4>Pepperoni</h4>
                    <h5>R$49,99</h5>
                    <div class="item-descriptor"><p>Pepperoni com Queijo</p></div>
                </div>
            </div>`);
    
    let doc = (
            `<div class="col-xl-4 col-md-6">
                <div id="bombom" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/bombom.jpg" alt="BOMBOM">
                    <h4>Bombom</h4>
                    <h5>R$49,90</h5>
                    <div class="item-descriptor"><p>Chocolate, Chocolate Branco, Confetes e Bombons </p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="choc-gran" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/chocolate-granulado.jpg" alt="CHOCOLATE-GRANULADO">
                    <h4>Chocolate com Granulado</h4>
                    <h5>R$49,90</h5>
                    <div class="item-descriptor"><p>Chocolate com Granulados, Contornados por Avelã e Cerejas</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="gotas-choc" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/gotas-chocolate.jpg" alt="GOTAS">
                    <h4>Gotas de Chocolate</h4>
                    <h5>R$49,90</h5>
                    <div class="item-descriptor"><p>Chocolate com Gotas</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="mm" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/M&M.jpg" alt="M&M">
                    <h4>M&M</h4>
                    <h5>R$55,90</h5>
                    <div class="item-descriptor"><p>Chocolate com M&M&#39;s e Cobertura de Morango</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="marshmellow" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/Marshmello.jpg" alt="MARSHMELLOW">
                    <h4>Marshmellow</h4>
                    <h5>R$55,90</h5>
                    <div class="item-descriptor"><p>Marshmellow Tostados com Morango</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="morango" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/morango.jpg" alt="MORANGO">
                    <h4>Morango</h4>
                    <h5>R$49,99</h5>
                    <div class="item-descriptor"><p>Chocolate e Morangos cobertos com Leite em Pó</p></div>
                </div>
            </div>`);

    let beb = (
            `<div class="col-xl-4 col-md-6">
                <div id="coca" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/coca.jpg" alt="COCA-COLA">
                    <h4>Coca Cola</h4>
                    <h5>R$7,00</h5>
                    <div class="item-descriptor"><p>Coca Cola KS 290ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="pepsi" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/pepsi-lata.jpg" alt="PEPSI">
                    <h4>Pepsi</h4>
                    <h5>R$5,99</h5>
                    <div class="item-descriptor"><p>Pepsi lata 269ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="sprite" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/sprite-lata.jpg" alt="SPRITE">
                    <h4>Sprite</h4>
                    <h5>R$5,00</h5>
                    <div class="item-descriptor"><p>Sprite Lata 220ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="guarana" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/guarana.jpg" alt="GUARANA">
                    <h4>Guaraná</h4>
                    <h5>R$6,00</h5>
                    <div class="item-descriptor"><p>Guaraná Lata 350ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="laranja" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/laranja.jpg" alt="SUCO-DE-LARANJA">
                    <h4>Suco de Laranja</h4>
                    <h5>R$14,99</h5>
                    <div class="item-descriptor"><p>Suco Natural de Laranja 500ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="maracuja" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/maracuja.jpg" alt="SUCO-DE-MARACUJA">
                    <h4>Suco de Maracujá</h4>
                    <h5>R$14,99</h5>
                    <div class="item-descriptor"><p>Suco Natural de Maracujá 500ml</p></div>
                </div>
            </div>`);

    let plcHolder = $('#placeholder');
    let menuCards = $('#menu-cards-box'); 

    if ($(this).attr('id') == 'Doces') {
        plcHolder.css('right', '35%');
        plcHolder.css('width', '27%');
        menuCards.html(doc);
    } else if ($(this).attr('id') == 'Bebidas') {
        plcHolder.css('right', '1%');
        plcHolder.css('width', '32%');
        menuCards.html(beb);
    } else {
        plcHolder.css('right', '64%');
        plcHolder.css('width', '35%');   
        menuCards.html(sal);
    }
    
    $('.menu-card').on('mouseenter', showDescriptor);
    $('.menu-card').on('mouseleave', hideDescriptor);
}

function showDescriptor() {
    $(this).children('.item-descriptor').css('opacity', 1);
    $(this).children().children().css('transform', 'translateY(-15px)');
}
function hideDescriptor() {
    $(this).children('.item-descriptor').css('opacity', 0);
    $(this).children().children().css('transform', 'translateY(10px)');
}