import { logger } from './logger'
import carouselPrevious from '/resources/assets/icons/carousel/previous.svg'
import carouselNext from '/resources/assets/icons/carousel/next.svg'

let carouselSources = {
    "src": ["https://images.unsplash.com/photo-1674592309639-39067f6a8111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1776&q=80",
        "https://images.unsplash.com/photo-1675410200389-903e50c46cbf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
        "https://images.unsplash.com/photo-1509817177816-ca503fa03f60?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
        "https://images.unsplash.com/photo-1675208986290-a72414630bbe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
        "https://plus.unsplash.com/premium_photo-1671643642938-ea7b23ad4d8f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
        "https://images.unsplash.com/photo-1675191475848-5dc8ec4bfafa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2128&q=80",
        "https://images.unsplash.com/photo-1675104180341-4b075869b3bf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2232&q=80"]
}
let carouselImages = [];

console.log(carouselSources);

export function initCarousel() {
    logger("Initializing carousel.js...");
    generateCarousel(true);

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

    if (document.getElementById("content") != undefined)
        document.getElementById("content").addEventListener("click", e => {
            if (e.target.classList.contains("carouselImageDisplayed")) {
                var popup = document.getElementById("imagePopup");
                if (popup != undefined)
                    popup.style.display = "flex";
            }
        });
}


/**
 *
 * @param {boolean} next -> false to display the previous image, true to display the next one
 * @returns
 */
function generateCarousel(next) {
    var carousel = document.getElementById("carousel");
    if (carousel == undefined) {
        logger("Carousel manquant", "error");
        return;
    }

    // Préparation de l'image dans le popup
    var popup = document.getElementById("imagePopup");
    if (popup == undefined) {
        logger("Popup manquant", "error");
        return;
    }
    if (carouselImages.length == 0)
        carouselImages = carouselSources.src;

    console.log(carouselImages);
    console.log(carouselImages.length);

    // Création :
    var content = "<div class='carouselLeft'>";
    content += "<img class = 'carouselNext' src='" + carouselNext + "'>";
    content += "<img class = 'carouselPrevious' src='" + carouselPrevious + "'>";


    if (next)
        carouselImages.push(carouselImages.shift());
    else
        carouselImages.unshift(carouselImages.pop());

    popup.innerHTML = "<img class='carouselImageDisplayed' src='" + carouselImages[0] + "'/>";
    content += "<img class='carouselImageDisplayed' src='" + carouselImages[carouselImages.length-1] + "'/>";
    content += "<img class='carouselImageDisplayed' src='" + carouselImages[0] + "'/>";
    content += "<img class='carouselImageDisplayed' src='" + carouselImages[1] + "'/>";
    content += "</div><div class='carouselRight'>";
    for (let i = 1; i < carouselImages.length; i++) {
        content += "<img src='" + carouselImages[i] + "'/>";
    }

    // if (next) {
    //     for (let i = 2; i < sources.length; i++) {
    //         content += "<img src='" + sources[i] + "'/>";
    //     }
    //     content += "<img src='" + sources[0] + "'/>";
    // }
    // else {
    //     // content += "<img src='" + sources[sources.length - 1] + "'/>";
    //     for (let i = 0; i < sources.length - 1; i++) {
    //         content += "<img src='" + sources[i] + "'/>";
    //     }
    // }
    content += "</div>";
    document.getElementById("carousel").innerHTML = content;

    document.getElementsByClassName("carouselNext")[0].addEventListener("click", function () {
        generateCarousel(true);
    });
    document.getElementsByClassName("carouselPrevious")[0].addEventListener("click", function () {
        generateCarousel(false);
    });
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
