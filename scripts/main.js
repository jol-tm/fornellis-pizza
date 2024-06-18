$(document).ready(function() {
    $(document).on('scroll', checkscroll);
    $('#open-nav').on('click', toogleMenuIcon);
    $('#close-nav').on('click', toogleMenuIcon);
    $('.menu-nav-btns').on('click', changeMenu);
    $('.menu-card').on('mouseenter', showDescriptor);
    $('.menu-card').on('mouseleave', hideDescriptor);
});

function checkscroll() {
    var btn = $('#scroll-up-btn');
    if (window.scrollY > 500 && window.scrollY < 4000) {
        btn.css('scale', 1);
    } else {
        btn.css('scale', 0);
    }
}

function toogleMenuIcon() {
    var openBtn = $('#open-nav');
    var closeBtn = $('#close-nav');
    var menuBtn = $('#nav-btn');

    if (menuBtn.attr('aria-expanded') == 'true') {
        openBtn.css('scale', 0);
        closeBtn.css('scale', 1);
    } else {
        openBtn.css('scale', 1);
        closeBtn.css('scale', 0);
    }
}

function changeMenu() {
    var sal = '<div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Marguerita</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Pizza</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Pizza</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Pizza</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Pizza</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Pizza</h4></div></div>';
    var doc = '<div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Pizza Doce</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Pizza Doce</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Pizza Doce</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/pizzaDoce.jpeg" alt=""><h4>Bebida</h4></div></div></div>';
    var beb = '<div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div><div class="col-xl-4 col-md-6"><div class="menu-card"><img class="img-fluid" src="imgs/marguerita.jpg" alt=""><h4>Bebida</h4></div></div></div>';

    if ($(this).attr('id') == 'Salgadas') {
        $('#placeholder').css('right', '64%');
        $('#placeholder').css('width', '35%');   
        $('#menu-cards-box').html(sal);
    } else if ($(this).attr('id') == 'Doces') {
        $('#placeholder').css('right', '35%');
        $('#placeholder').css('width', '27%');
        $('#menu-cards-box').html(doc);
    } else if ($(this).attr('id') == 'Bebidas') {
        $('#placeholder').css('right', '1%');
        $('#placeholder').css('width', '32%');
        $('#menu-cards-box').html(beb);
    }
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