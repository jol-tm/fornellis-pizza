$(document).ready(function() {
    $('.menu-nav-btns').on('click', changeMenu);
    $('.menu-card').on('mouseenter', showDescriptor);
    $('.menu-card').on('mouseleave', hideDescriptor);
    $('#user-icon').on('click', UserMenu);
    $('.hide-user-menu').on('click', closeUserMenu);
    $('#open-nav').on('click', toogleMenuIcon);
    $('#close-nav').on('click', toogleMenuIcon);
    $(document).on('scroll', checkscroll);
    changeMenu();
    AOS.init();
    setTimeout(() => { AOS.refresh(); }, 1000);
});

function changeMenu() {
    let plcHolder = $('#placeholder');
    let salty = $('#salty-menu'); 
    let sweet = $('#sweet-menu'); 
    let drinks = $('#drinks-menu'); 

    if ($(this).attr('id') == 'Doces') {
        plcHolder.css('right', '35%');
        plcHolder.css('width', '27%');
        salty.css('display', 'none');
        sweet.css('display', 'flex');
        drinks.css('display', 'none');
    } else if ($(this).attr('id') == 'Bebidas') {
        plcHolder.css('right', '1%');
        plcHolder.css('width', '32%');
        salty.css('display', 'none');
        sweet.css('display', 'none');
        drinks.css('display', 'flex');
    } else {
        plcHolder.css('right', '64%');
        plcHolder.css('width', '35%');   
        salty.css('display', 'flex');
        sweet.css('display', 'none');
        drinks.css('display', 'none');
    }
    
    $('.menu-card').on('mouseenter', showDescriptor);
    $('.menu-card').on('mouseleave', hideDescriptor);
}

function showDescriptor() {
    $(this).children('.item-descriptor').css('opacity', 1);
    $(this).children().children('p').css('transform', 'translateY(-50px)');
}
function hideDescriptor() {
    $(this).children('.item-descriptor').css('opacity', 0);
    $(this).children().children('p').css('transform', 'translateY(10px)');
}

function UserMenu() {
    let popUp = $('.pop-up-box');
    let loginMenu = $('#login-menu');
    let signUpMenu = $('#sign-up-menu');
    let signUpLink = $('#sign-up-link');
    // Mostra o pop up de login na tela
    popUp.css({'display': 'flex', 'opacity': 1});
    loginMenu.css('display', 'flex');
    // Troca a tela de pop up para a de cadastro
    signUpLink.on('click', () => {
        loginMenu.css('display', 'none');
        signUpMenu.css('display', 'flex');
    })
}

function closeUserMenu(){
    // Ao clicar em fechar roda a animação e após 300ms fecha o pop up de login/cadastro
    $('.pop-up-box').css('opacity', 0);
    setTimeout(() => {
        $('.pop-up-box').css('display', 'none');
        $('#sign-up-menu').css('display', 'none');
    }, 300);
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

function checkscroll() {
    let btn = $('#scroll-up-btn');
    let txt = $('.carousel-text');
    let nav = $('.nav-css');
    
    if (window.scrollY < 230) {
        txt.css('transform', 'translateY(0)');
        txt.css('opacity', 1);
        btn.css('bottom', '-3.5rem');
        nav.css('backgroundColor', 'var(--c1)');
    } else if (window.scrollY < 4200) {
        btn.css('bottom', '1rem');
        txt.css('transform', 'translateY(-100px)');
        txt.css('opacity', 0);
        nav.css('backgroundColor', 'var(--c6)');
    } else {
        btn.css('bottom', '3rem');
    }
}