let lang;

function initUtils() {
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
    document.addEventListener("click", closeAllSelect);

    // Checkboxes
    let checkTab = document.getElementsByClassName("checkBox");
    for (let i = 0; i < checkTab.length; i++) {
        checkTab[i].addEventListener("click", function () {
            if (!this.classList.contains("disabled")) {
                this.querySelectorAll('input')[0].checked = !this.querySelectorAll('input')[0].checked;
                this.querySelectorAll('div')[0].classList.toggle("checked");
            }
        });
    }

    // Cookie de langue :
    lang = getCookie("lang");
    console.log(lang);
    if (lang === null) {
        lang = "fr";
        setCookie("lang", lang);
    }
}

function closeAllSelect(event) {
    let selectTab = document.getElementsByClassName("select");
    for (i = 0; i < selectTab.length; i++) {
        if (selectTab[i].classList.contains("selectActive") && event.target.parentNode != selectTab[i] && event.target.parentNode.parentNode != selectTab[i]) {
            selectTab[i].classList.remove("selectActive");
            selectTab[i].classList.add("selectInactive");
        }
    }
}

function setCookie(name, value) {
    let cookie = name + "=" + encodeURIComponent(value);
    cookie += "; max-age=" + (365 * 24 * 60 * 60); // Le cookie expire dans 1 an
    cookie += "; Secure; SameSite=Strict; path=/"; // Pour éviter les messages d'erreur
    document.cookie = cookie;

}

function getCookie(name) {
    let cookies = document.cookie.split(";");

    for (let a = 0; a < cookies.length; a++) {
        var cookieNameValue = cookies[a].split("=");

        if (name == cookieNameValue[0].trim()) { // Retire les espaces inutiles
            return decodeURIComponent(cookieNameValue[1]);
        }
    }
    return null; // Si non trouvé
}