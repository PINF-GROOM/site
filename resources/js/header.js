import { logger } from "./logger";

export function initHeader(){
    // Language choice
    logger("Header loaded", "info");
    if (document.getElementById("languageChoice") != undefined) {
        document.addEventListener("click", function (e) {
            if (e.target == document.getElementById("languageIcon") || e.target == document.getElementById("languageIcon").querySelector('svg') || e.target == document.getElementById("languageIcon").querySelector('path')) {
                if (!document.getElementById("languageChoice").classList.contains("languageShown"))
                    showLanguage();
                else
                    closeLanguage();
            }
            // Language selection
            else if (e.target == document.getElementById("languageSelectFr") || e.target == document.getElementById("languageSelectFr").querySelector('svg') || e.target == document.getElementById("languageSelectFr").querySelector('path')) {
                setCookie("lang", "fr");
                location.reload();
            }
            else if (e.target == document.getElementById("languageSelectEn") || e.target == document.getElementById("languageSelectEn").querySelector('svg') || e.target == document.getElementById("languageSelectEn").querySelector('path')) {
                setCookie("lang", "en");
                location.reload();
            }
            else if (e.target == document.getElementById("languageSelectEs") || e.target == document.getElementById("languageSelectEs").querySelector('svg') || e.target == document.getElementById("languageSelectEs").querySelector('path')) {
                setCookie("lang", "es");
                location.reload();
            }
            else if (e.target == document.getElementById("languageSelectDe") || e.target == document.getElementById("languageSelectDe").querySelector('svg') || e.target == document.getElementById("languageSelectDe").querySelector('path')) {
                setCookie("lang", "de");
                location.reload();
            }

            else {
                if (document.getElementById("languageChoice").classList.contains("languageShown"))
                    closeLanguage();
            }
        });
    }
}

function showLanguage() {
    if (!document.getElementById("languageChoice").classList.contains("languageShown")) {
        document.getElementById("languageChoice").classList.add("languageShown");
        document.getElementById("languageChoice").classList.remove("languageHidden");
    }
}

function closeLanguage() {
    if (document.getElementById("languageChoice").classList.contains("languageShown")) {
        document.getElementById("languageChoice").classList.add("languageHidden");
        document.getElementById("languageChoice").classList.remove("languageShown");
    }
}