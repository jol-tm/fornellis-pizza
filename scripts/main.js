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
    } else if (archive == "editMenu.php") {
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    } else if (archive == "orders.php") {
        fetchOrders();
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
    const progressBar = $('#progressBar');
    let time = 20;
    
    const timer = setInterval(() => {
        if (time >= 0) {
            let barSize = (time / 20 *100) + "%";
            timerDisplayer.text(`Sua compra vai ser finalizada em ${time} segundos`);
            progressBar.css('width', barSize);
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
        window.scrollTo(0, $(document).height());
        $('#cancel').on('click', () => {
            $('#deleteAccConfirmation').css('opacity', 0);
            setTimeout(() => {
                $('#deleteAccConfirmation').css('display', 'none');
            }, 300);
        })
    });
}

async function fetchOrders() {
    let response = await fetch('classes/pedido.php?method=listAllOrders');
    let data = await response.json();
    
    displayOrders(data);

    const timeout = setTimeout(() => {
        fetchOrders();
    }, 5000);
}

function displayOrders(data) {
    let content = "";

    for (let i = 0; i < data.length; i++) {
        const el = data[i];

        content = `
        <div class='item'>
            <h4 class='itemCol content'>${el['nome']} x ${el['quantidade']}</h4>
            <h4 class='itemCol'>R$${el['valor_total'].replace(".", ",")}</h4>
            <h4 class='itemCol'>${el['numero']}</h4>
            <h4 class='itemCol'>${el['endereco']}</h4>
            <form id='controlOrder' action='dataAcess/manageOrder.php' method='post'>
                <input type='hidden' name='idCliente' value='${el['idCliente']}'></input>
                <button type='submit' id='acceptBtn' name='accept'><img src='imgs/icones/accept.svg' alt=''></button>
                <button type='submit' id='denyBtn' name='deny'><img height=24 src='imgs/icones/close-nav.svg' alt=''></button>
            </form>                        
        </div>` + content;
    }

    $('#itens').html(content);
}