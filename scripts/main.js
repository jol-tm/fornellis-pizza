$(document).ready(function() {
    $(document).on('scroll', checkscroll);
    $('#open-nav').on('click', toogleMenuIcon);
    $('#close-nav').on('click', toogleMenuIcon);
    $('.menu-nav-btns').on('click', changeMenu);
    $('.menu-card').on('mouseenter', showDescriptor);
    $('.menu-card').on('mouseleave', hideDescriptor);
    AOS.init();
});

function checkscroll() {
    let btn = $('#scroll-up-btn');
    if (window.scrollY < 500) {
        btn.css('bottom', '-3.5rem');
    } else if (window.scrollY < 4200) {
        btn.css('bottom', '1rem');
    } else if (window.scrollY >= 4200) {
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
                    <img class="img-fluid" src="imgs/cardapio/marguerita.jpg" alt="">
                    <h4>Marguerita</h4>
                    <h5>R$59,90</h5>
                    <div class="item-descriptor"><p>Tomate, mussarela e manjericão</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="frango-catupiry" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/Frango-com-catupiry.jpg" alt="">
                    <h4>Frango com Catupiry</h4>
                    <h5>R$49,99</h5>
                    <div class="item-descriptor"><p>Frango, catupiry, milho e azeitonas</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="4queijos" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/queijo-full.jpg" alt="">
                    <h4>Quatro Queijos</h4>
                    <h5>R$59,90</h5>
                    <div class="item-descriptor"><p>Queijo Mussarela, Parmesão, Gorgonzola e Provolone</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="calabresa" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/calabresa.jpg" alt="">
                    <h4>Calabresa</h4>
                    <h5>R$47,99</h5>
                    <div class="item-descriptor"><p>Calabresa com Queijo</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="strogonoff-frango" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/strogonoff-de-frango.jpg" alt="">
                    <h4>Strogonoff de frango</h4>
                    <h5>R$59,90</h5>
                    <div class="item-descriptor"><p>Strogonoff de Frango, Queijo e Batata Palha </p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="pepperoni" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/pepperoni.jpg" alt="">
                    <h4>Pepperoni</h4>
                    <h5>R$49,99</h5>
                    <div class="item-descriptor"><p>Pepperoni com Queijo</p></div>
                </div>
            </div>`);
    
    let doc = (
            `<div class="col-xl-4 col-md-6">
                <div id="bombom" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/bombom.jpg" alt="">
                    <h4>Bombom</h4>
                    <div class="item-descriptor"><p>Chocolate, Chocolate Branco, Confetes e Bombons </p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="choc-gran" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/chocolate-granulado.jpg" alt="">
                    <h4>Chocolate com Granulado</h4>
                    <div class="item-descriptor"><p>Chocolate com Granulados, Contornados por Avelã e Cerejas</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="gotas-choc" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/gotas-chocolate.jpg" alt="">
                    <h4>Gotas de Chocolate</h4>
                    <div class="item-descriptor"><p>Chocolate com Gotas</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="mm" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/M&M.jpg" alt="">
                    <h4>M&M</h4>
                    <div class="item-descriptor"><p>Chocolate com M&M&#39;s e Cobertura de Morango</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="marshmellow" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/Marshmello.jpg" alt="">
                    <h4>Marshmellow</h4>
                    <div class="item-descriptor"><p>Marshmellow Tostados com Morango</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="morango" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/morango.jpg" alt="">
                    <h4>Morango</h4>
                    <div class="item-descriptor"><p>Chocolate e Morangos cobertos com Leite em Pó</p></div>
                </div>
            </div>`);

    let beb = (
            `<div class="col-xl-4 col-md-6">
                <div id="coca" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/coca.jpg" alt="">
                    <h4>Coca Cola</h4>
                    <div class="item-descriptor"><p>Coca Cola KS 290ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="pepsi" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/pepsi-lata.jpg" alt="">
                    <h4>Pepsi</h4>
                    <div class="item-descriptor"><p>Pepsi lata 269ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="sprite" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/sprite-lata.jpg" alt="">
                    <h4>Sprite</h4>
                    <div class="item-descriptor"><p>Sprite Lata 220ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="guarana" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/guarana.jpg" alt="">
                    <h4>Guaraná</h4>
                    <div class="item-descriptor"><p>Guaraná Lata 350ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="laranja" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/laranja.jpg" alt="">
                    <h4>Suco de Laranja</h4>
                    <div class="item-descriptor"><p>Suco Natural de Laranja 500ml</p></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div id="maracuja" class="menu-card">
                    <img class="img-fluid" src="imgs/cardapio/maracuja.jpg" alt="">
                    <h4>Suco de Maracujá</h4>
                    <div class="item-descriptor"><p>Suco Natural de Maracujá 500ml</p></div>
                </div>
            </div>`);

    let plcHolder = $('#placeholder');
    let menuCards = $('#menu-cards-box'); 

    if ($(this).attr('id') == 'Salgadas') {
        plcHolder.css('right', '64%');
        plcHolder.css('width', '35%');   
        menuCards.html(sal);
    } else if ($(this).attr('id') == 'Doces') {
        plcHolder.css('right', '35%');
        plcHolder.css('width', '27%');
        menuCards.html(doc);
    } else if ($(this).attr('id') == 'Bebidas') {
        plcHolder.css('right', '1%');
        plcHolder.css('width', '32%');
        menuCards.html(beb);
    }
    
    $('.menu-card').on('mouseenter', showDescriptor);
    $('.menu-card').on('mouseleave', hideDescriptor);
}

function showDescriptor() {
    $(this).children('.item-descriptor').css('opacity', 1);
    $(this).children().children().css('scale', 1.1);
    $(this).css('scale', .99); 
}
function hideDescriptor() {
    $(this).children('.item-descriptor').css('opacity', 0);
    $(this).children().children().css('scale', 1);
    $(this).css('scale', 1);
}