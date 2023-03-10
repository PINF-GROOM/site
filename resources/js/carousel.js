import { logger } from './logger'
import carouselPrevious from '/resources/assets/icons/carousel/previous.svg'
import carouselNext from '/resources/assets/icons/carousel/next.svg'

let carouselSources;
let carouselImages = [];

export function initCarousel() {
    logger("Initializing carousel.js...");

    // TEMP

    carouselSources = {
        "src": ["https://images.unsplash.com/photo-1674592309639-39067f6a8111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1776&q=80",
            "https://images.unsplash.com/photo-1675410200389-903e50c46cbf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
            "https://images.unsplash.com/photo-1509817177816-ca503fa03f60?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
            "https://images.unsplash.com/photo-1675208986290-a72414630bbe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
            "https://plus.unsplash.com/premium_photo-1671643642938-ea7b23ad4d8f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
            "https://images.unsplash.com/photo-1675191475848-5dc8ec4bfafa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2128&q=80",
            "https://images.unsplash.com/photo-1675104180341-4b075869b3bf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2232&q=80"]
    }
    carouselImages = carouselSources.src;
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


    if (document.getElementById("content") != undefined) {
        document.getElementById("content").addEventListener("click", e => {
            if (e.target.classList.contains("carouselImageDisplayed")) {
                var popup = document.getElementById("imagePopup");
                if (popup != undefined)
                    popup.style.display = "flex";
            }
            else if (e.target.classList.contains("carouselQueueItem")) {
                generateCarousel(false, e.target.src);
            }
        });

        document.addEventListener('keydown', (e) => {
            if (document.getElementById("imagePopup") != undefined) {
                if (document.getElementById("imagePopup").style.display != "none" && document.getElementById("imagePopup").style.display != "undefined" && document.getElementById("imagePopup").style.display != "") {
                    if (e.key == "ArrowRight")
                        nextImage();
                    else if (e.key == "ArrowLeft")
                        previousImage();
                    else if (e.key == "Escape")
                        document.getElementById("imagePopup").style.display = "none";
                }
            }
        });
    }
}


/**
 * @brief
 * @param {boolean} next -> false to display the previous image, true to display the next one
 * @param {String} src   -> To display a certain image
 * @returns
 */
function generateCarousel(next, src) {
    var carousel = document.getElementById("carousel");
    if (carousel == undefined) {
        logger("Carousel manquant", "error");
        return;
    }

    // Pr??paration de l'image dans le popup
    var popup = document.getElementById("imagePopup");
    if (popup == undefined) {
        logger("Popup manquant", "error");
        return;
    }

    // Cr??ation :
    var content = "<div class='carouselLeft'>";
    content += "<img class = 'carouselNext' src='" + carouselNext + "'>";
    content += "<img class = 'carouselPrevious' src='" + carouselPrevious + "'>";
    if (src != undefined) {
        for (let i = 0; i < carouselImages.length; i++) {
            if (src == carouselImages[i]) {
                for (let y = 0; y < i; y++) {
                    carouselImages.push(carouselImages.shift());
                }
            }
        }
    }
    else if (next)
        carouselImages.push(carouselImages.shift());
    else
        carouselImages.unshift(carouselImages.pop());

    var popupContent = "<div class='carouselPopupImage'>";
    popupContent += "<img class = 'carouselNext' src='" + carouselNext + "'>";
    popupContent += "<img class = 'carouselPrevious' src='" + carouselPrevious + "'>";
    popupContent += "<img class='carouselImageDisplayed' src='" + carouselImages[0] + "'/></div>";
    popup.innerHTML = popupContent;


    content += "<img class='carouselImageDisplayed' src='" + carouselImages[carouselImages.length - 1] + "'/>";
    content += "<img class='carouselImageDisplayed' src='" + carouselImages[0] + "'/>";
    content += "<img class='carouselImageDisplayed' src='" + carouselImages[1] + "'/>";
    content += "</div><div class='carouselRight'>";
    for (let i = 1; i < carouselImages.length; i++) {
        content += "<img class='carouselQueueItem' src='" + carouselImages[i] + "'/>";
    }

    content += "</div>";
    document.getElementById("carousel").innerHTML = content;

    document.getElementsByClassName("carouselNext")[0].addEventListener("click", function () {
        generateCarousel(true);
    });
    document.getElementsByClassName("carouselPrevious")[0].addEventListener("click", function () {
        generateCarousel(false);
    });
    document.getElementsByClassName("carouselNext")[1].addEventListener("click", function () {
        generateCarousel(true);
    });
    document.getElementsByClassName("carouselPrevious")[1].addEventListener("click", function () {
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
