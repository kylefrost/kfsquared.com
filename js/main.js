function move() {
    var nav = $("#nav");

    if (nav.hasClass("up") && !nav.hasClass("fadeup")) {
        nav.toggleClass("fadedown");
    } else {
        nav.toggleClass("fadedown");
        nav.toggleClass("fadeup");
    }

    nav.toggleClass("up");
    nav.toggleClass("down");

    $("#hamburger").toggleClass("is-active");
}

function hideHelp() {
    $("#modal").css("display", "none");
}

function helpDown() {
    var modal = $("#modal");
    var modalContent = $("#modal-content");

    var modalHeight = modal.height();
    var modalContentHeight = modalContent.height();

    modal.animate({
        opacity: 0.0
    }, "fast");

    modalContent.animate({ 
        bottom: -modalContentHeight - 10,
        opacity: 0.0
    }, "fast", hideHelp);
}

function helpUp() {
    var modal = $("#modal");
    var modalContent = $("#modal-content");

    var modalHeight = modal.height();
    var modalContentHeight = modalContent.height();

    modal.css("display", "block");

    modal.animate({
        opacity: 1.0
    }, "fast");

    modalContent.animate({ 
        bottom: modalContentHeight,
        opacity: 1.0
    }, "fast");
}

if($("#modal").length) {
    helpDown();
}

window.onclick = function(event) {
    if (event.target == document.getElementById("modal")) {
        helpDown();
    }
}

if($(".carousel").length) {
    var flkty = new Flickity('.carousel', {
        setGallerySize: false,
        wrapAround: true,
        imagesLoaded: true,
        pageDots: false
    });
}
