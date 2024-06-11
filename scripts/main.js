/*document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("scroll", checkscroll);
    document.getElementById("open-menu").addEventListener("click", toogleMenuIcon);
    document.getElementById("close-menu").addEventListener("click", toogleMenuIcon);
    checkscroll();
})*/

$(document).ready(function() {
    $(document).on("scroll", checkscroll);
    $('#open-menu').on("click", toogleMenuIcon);
    $('#close-menu').on("click", toogleMenuIcon);
});

function toogleMenuIcon() {
    var openBtn = $("#open-menu"); //document.getElementById("open-menu");
    var closeBtn = $("#close-menu"); //document.getElementById("close-menu");
    var menuBtn = $("#menu-btn"); //document.getElementById("menu-btn");

    if (menuBtn.attr("aria-expanded") == "true") {
        openBtn.css('scale', 0);
        closeBtn.css('scale', 1);
    } else {
        openBtn.css('scale', 1);
        closeBtn.css('scale', 0);
    }
}

function checkscroll() {
    btn = $("#scroll-up-btn");
    if (window.scrollY > 500) {
        btn.css('scale', 1);
    } else {
        btn.css('scale', 0);
    }
}