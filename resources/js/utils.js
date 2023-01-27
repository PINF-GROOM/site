import { logger } from './logger'

export function initUtils() {
    logger("Initializing utils.js...");

    // Selects
    let selectTab = document.getElementsByClassName("select");
    for (let i = 0; i < selectTab.length; i++) {
        selectTab[i].style.width = getComputedStyle(selectTab[i]).width;
        let selectOption = selectTab[i].getElementsByClassName("selectOption");
        let parentHeight = getComputedStyle(selectTab[i]).height;
        parentHeight = parentHeight.toString().slice(0, -2);
        for (let y = 0; y < selectOption.length; y++) {
            selectOption[y].style.top = parseInt(parentHeight) * (y + 1) + "px";
            selectOption[y].style.height = parentHeight + "px";
            // Lorsqu'une option est cliquée :
            selectOption[y].addEventListener("click", function () {
                this.parentNode.getElementsByClassName("selectTitle")[0].querySelectorAll('label')[0].innerHTML = this.innerHTML;
                this.parentNode.querySelectorAll('input')[0].value = this.innerHTML;
            });
        }
        selectTab[i].addEventListener("click", function () {
            if (!this.classList.contains("disabled")) {
                this.classList.toggle("selectActive");
                this.classList.toggle("selectInactive")
            };
        });
    }

    // Handling click events
    document.addEventListener("click", closeAllSelect);
    let content = document.getElementById('content');

    content.addEventListener('click', (e) => {
        if (e.target.classList.contains('checkBox')) {
            if (!e.target.classList.contains("disabled")) {
                e.target.querySelectorAll('input')[0].checked = !e.target.querySelectorAll('input')[0].checked;
                e.target.querySelectorAll('div')[0].classList.toggle("checked");
            }
        }

        else if (e.target.parentNode != null) {
            if (e.target.parentNode.classList.contains('checkBox')) {
                if (!e.target.parentNode.classList.contains("disabled")) {
                    e.target.parentNode.querySelectorAll('input')[0].checked = !e.target.parentNode.querySelectorAll('input')[0].checked;
                    e.target.parentNode.querySelectorAll('div')[0].classList.toggle("checked");
                }
            }
        }

        if (e.target.parentNode.parentNode != null) {
            if (e.target.parentNode.parentNode.classList.contains('checkBox')) {
                if (!e.target.parentNode.parentNode.classList.contains("disabled")) {
                    e.target.parentNode.parentNode.querySelectorAll('input')[0].checked = !e.target.parentNode.parentNode.querySelectorAll('input')[0].checked;
                    e.target.parentNode.parentNode.querySelectorAll('div')[0].classList.toggle("checked");
                }
            }
        }
    });
}

function closeAllSelect(event) {
    let selectTab = document.getElementsByClassName("select");
    for (let i = 0; i < selectTab.length; i++) {
        if (selectTab[i].classList.contains("selectActive") && event.target.parentNode != selectTab[i] && event.target.parentNode.parentNode != selectTab[i]) {
            selectTab[i].classList.remove("selectActive");
            selectTab[i].classList.add("selectInactive");
        }
    }
}

logger("utils.js loaded");
