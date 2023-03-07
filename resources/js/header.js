import { logger } from "./logger";

export function initHeader() {

    // Mobile nav
    if (document.getElementById("burgerNav") != undefined) {
        document.getElementById("burgerButton").checked = false; // To prevent burgerButton icon being crossed because of reloading

        document.getElementById("burgerButton").addEventListener("change", (e) => {
            console.log(e.currentTarget.checked);
            if (e.currentTarget.checked)
                // document.getElementById("burgerNav").style.display = "flex";
                document.getElementById("burgerNav").classList.add("burgerNavDisplayed");
            else
                // document.getElementById("burgerNav").style.display = "none";
                document.getElementById("burgerNav").classList.remove("burgerNavDisplayed");
        });

        window.addEventListener('resize', (e) => {
            console.log("prout");
            document.getElementById("burgerButton").checked = false;
            console.log(document.getElementById("burgerButton").checked);
            // document.getElementById("burgerNav").style.display = "none";
            document.getElementById("burgerNav").classList.remove("burgerNavDisplayed");
        });
    }

    // Language choice
    logger("Header loaded", "info");
    if (document.getElementsByClassName("languageChoice")[0] != undefined) {
        for (let i = 0; i < document.getElementsByClassName("languageChoice").length; i++) {
            document.getElementsByClassName("languageIcon")[i].addEventListener("click", (e) => {
                console.log(e.currentTarget);
                console.log(e.currentTarget.getElementsByClassName("languageChoice")[0]);
                if (!e.currentTarget.getElementsByClassName("languageChoice")[0].classList.contains("languageShown"))
                    showLanguage(e.currentTarget.getElementsByClassName("languageChoice")[0]);
                else
                    closeLanguage(e.currentTarget.getElementsByClassName("languageChoice")[0]);

            });
        }
        for (let i = 0; i < document.getElementsByClassName("languageChoiceIcon").length; i++) {
            document.getElementsByClassName("languageChoiceIcon")[i].addEventListener("click", (e) => {
                if (e.currentTarget.classList.contains("languageSelectFr")){
                    setCookie("lang", "fr");
                    location.reload();
                }
                else if (e.currentTarget.classList.contains("languageSelectEn")){
                    setCookie("lang", "en");
                    location.reload();
                }
                else if (e.currentTarget.classList.contains("languageSelectEs")){
                    setCookie("lang", "es");
                    location.reload();
                }
                else if (e.currentTarget.classList.contains("languageSelectDe")){
                    setCookie("lang", "de");
                    location.reload();
                }
            });
        }
    }
}

function showLanguage(node) {
    if (!node.classList.contains("languageShown")) {
        node.classList.add("languageShown");
        node.classList.remove("languageHidden");
    }
}

function closeLanguage(node) {
    if (node.classList.contains("languageShown")) {
        node.classList.add("languageHidden");
        node.classList.remove("languageShown");
    }
}

function setCookie(){
    console.log("Prout");
}
