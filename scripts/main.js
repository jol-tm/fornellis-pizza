/*document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("scroll", checkscroll);
    document.getElementById("open-menu").addEventListener("click", toogleMenuIcon);
    document.getElementById("close-menu").addEventListener("click", toogleMenuIcon);
    checkscroll();
})*/

$(document).ready(function() {
    $(document).on('scroll', checkscroll);
    $('#open-nav').on('click', toogleMenuIcon);
    $('#close-nav').on('click', toogleMenuIcon);
    $('.menu-nav-btns').on('click', changeMenu);
});

function checkscroll() {
    var btn = $('#scroll-up-btn');
    if (window.scrollY > 500 && window.scrollY < 3100) {
        btn.css('scale', 1);
    } else {
        btn.css('scale', 0);
    }
}

function toogleMenuIcon() {
    var openBtn = $('#open-nav'); //document.getElementById("open-menu");
    var closeBtn = $('#close-nav'); //document.getElementById("close-menu");
    var menuBtn = $('#nav-btn'); //document.getElementById("menu-btn");

    if (menuBtn.attr('aria-expanded') == 'true') {
        openBtn.css('scale', 0);
        closeBtn.css('scale', 1);
    } else {
        openBtn.css('scale', 1);
        closeBtn.css('scale', 0);
    }
}

function changeMenu() {
    var sal = '<div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Marguerita</h4></div></div><div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Pizza salgada</h4></div></div><div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Pizza salgada</h4></div></div><div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Pizza salgada</h4></div></div></div>';
    var doc = '<div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Pizza Doce</h4></div></div><div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Pizza Doce</h4></div></div><div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Pizza Doce</h4></div></div><div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Bebida</h4></div></div></div>';
    var beb = '<div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-3 col-lg-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div></div>';

    if ($(this).attr('id') == 'Salgadas') {
        $('#placeholder').css('right', '99%');
        $('#placeholder').css('marginRight', '-6.5rem');
        $('#placeholder').css('width', '6.5rem');   
        $('#menu-cards-box').html(sal);
    } else if ($(this).attr('id') == 'Doces') {
        $('#placeholder').css('right', '63%');
        $('#placeholder').css('marginRight', '-5rem');
        $('#placeholder').css('width', '5rem');
        $('#menu-cards-box').html(doc);
    } else if ($(this).attr('id') == 'Bebidas') {
        $('#placeholder').css('right', '35%');
        $('#placeholder').css('marginRight', '-6rem');
        $('#placeholder').css('width', '6rem');
        $('#menu-cards-box').html(beb);
    }
}