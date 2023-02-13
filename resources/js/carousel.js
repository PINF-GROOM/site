import { logger } from './logger'

export function initCarousel() {
    logger("Initializing carousel.js...");
    generateCarousel();

    var popup = document.getElementById("imagePopup");
    if (popup != undefined) {
        popup.addEventListener("click", e => {
            if (e.target.tagName != "IMG") {
                let popup = document.getElementById("imagePopup");
                if (popup != undefined)
                    popup.style.display = "none";
            }
        });
    }

    document.getElementsByClassName("carouselImageDisplayed")[0].addEventListener("click", function () {
        console.log("click");
        var popup = document.getElementById("imagePopup");
        if (popup != undefined)
            popup.style.display = "flex";
    });

    document.getElementsByClassName("carouselNext")[0].addEventListener("click", function () {
        generateCarousel(true);
    });
    document.getElementsByClassName("carouselPrevious")[0].addEventListener("click", function () {
        generateCarousel(false);
    });
}


/**
 *
 * @param {boolean} next -> false to display the previous image, true to display the next one
 * @returns
 */
function generateCarousel(next) {
    // console.log("carouselGenerated");
    var carousel = document.getElementById("carousel");
    if (carousel == undefined) {
        logger("Carousel manquant", "error");
        return;
    }
    var images = carousel.getElementsByTagName("img");
    if (images.length == 0) {
        logger("Aucune image dans le carousel", "error");
        return;
    }

    var sources = [];

    for (let i = 0; i < images.length; i++) {
        sources.push(images[i].src);
    }
    console.log(sources);

    // Création :
    if (next)
        var content = "<img class='carouselImageDisplayed' src='" + sources[1] + "'/>";
    else
        content = "<img class='carouselImageDisplayed' src='" + sources[sources.length - 1] + "'/>";
    content += "<div class='carouselRight'>";

    if (next) {
        content += "";
        for (let i = 2; i < sources.length; i++) {
            content += "<img src='" + sources[i] + "'/>";
        }
        content += "<img src='" + sources[0] + "'/>";
    }
    else {

        content += "<img src='" + sources[sources.length - 2] + "'/>";
        for (let i = 0; i < sources.length - 1; i++) {
            content += "<img src='" + sources[i] + "'/>";
        }
    }
    content += "</div>";
    document.getElementById("carousel").innerHTML = content;
}

function imageToPopup() {
    // TODO:
}

function previousImage() {
    generateCarousel(false);
}
function nextImage() {
    generateCarousel(true);
}

function chooseImage() {
    // TODO:
}
