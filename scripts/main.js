$(document).ready(function() {
    $('.menu-nav-btns').on('click', changeMenu);
    $('.menu-card').on('mouseenter', showDescriptor);
    $('.menu-card').on('mouseleave', hideDescriptor);
    $('#user-icon').on('click', UserMenu);
    $('.hide-user-menu').on('click', closeUserMenu);
    $(document).on('scroll', checkscroll);

    // Roda uma animação quando a imagem carrega
    $('#loadingScreenImg').on('load', () => {
        $('#loadingScreenImg').css('opacity', 1);
    });
    if ($('#loadingScreenImg')[0].complete) {
        $('#loadingScreenImg').trigger('load');
    }

    changeMenu();
    AOS.init();

    setTimeout(() => { AOS.refresh(); }, 1000);
    if (window.history.replaceState) {
        window.history.replaceState( null, null, window.location.href );
    }

    let path = window.location.href;
    let archive = path.substring(path.lastIndexOf('/') + 1);
    if (archive == "endPurchase.php") {
        endPurchaseTimer();
    } else if (archive == "purchaseHistory.php" ||archive == "admPurchaseHistory.php") {
        paintStatus();
    } else if (archive == "changeRegistration.php") {
        showDeletionConfirmation();
    }

});

$(window).on('load', () => {
    $('#loadingScreen').css({'opacity': 0, 'pointer-events': 'none'});
});

function changeMenu() {
    const plcHolder = $('#placeholder');
    const salty = $('#salty-menu'); 
    const sweet = $('#sweet-menu'); 
    const drinks = $('#drinks-menu'); 

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
    const popUp = $('.pop-up-box');
    const loginMenu = $('#login-menu');
    const signUpMenu = $('#sign-up-menu');
    const signUpLink = $('#sign-up-link');
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

function checkscroll() {
    const btn = $('#scroll-up-btn');
    const txt = $('.carousel-text');
    const nav = $('.nav-css');
    
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

function endPurchaseTimer() {
    const timerDisplayer = $('#endPurchaseTimer');
    let time = 20;

    const timer = setInterval(() => {
        if (time >= 0) {
            timerDisplayer.text(`Sua compra vai ser finalizada em ${time} segundos`);
            time --;
        } else {
            window.location.href += "?purchase=true";
            clearTimeout(timer);
        }
    }, 1000);
}

function paintStatus() {
    let rows = $('.status');
    rows.each(function() {
        let e = $(this);

        if (e.text() == "Aceito") {
            e.css('color', '#4ab34a');
        } else if (e.text() == "Negado") {
            e.css('color', '#a70011');
        }
    });
}

function showDeletionConfirmation() {
    $('#deleteAccBtn').on('click', () => {
        $('#deleteAccConfirmation').css('opacity', 1);
        $('#deleteAccConfirmation').css('display', 'flex');
        $('#cancel').on('click', () => {
            $('#deleteAccConfirmation').css('opacity', 0);
            setTimeout(() => {
                $('#deleteAccConfirmation').css('display', 'none');
            }, 300);
        })
    });
}