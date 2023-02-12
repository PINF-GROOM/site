import { logger } from './logger'

import calendarIconLeftArrow from '/resources/assets/icons/calendar/leftArrow.svg'
import calendarIconRightArrow from '/resources/assets/icons/calendar/rightArrow.svg'
import calendarIconToday from '/resources/assets/icons/calendar/today.svg'
import calendarIconClear from '/resources/assets/icons/calendar/clear.svg'
import calendarIconInfo from '/resources/assets/icons/calendar/info.svg'

export const frenchWeek = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];
export const frenchYear = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
export const takenDay = ['2022-12-20', '2022-12-21', '2022-12-22', '2023-1-22'];
export let takenDate = [];

const fr = {
    "dayNames": ['L', 'M', 'M', 'J', 'V', 'S', 'D'],
    "monthNames": ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
}

const en = {
    "dayNames": ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
    "monthNames": ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
}

// const shortcuts = []

const langTranslations = {
    'fr': fr,
    'en': en
}


export let languageStatus = 0;
export let today = new Date();

export let selectionStart;
export let selectionEnd;

export function initAssets() {
    logger("Initializing assets.js...");

    // Convertir le tableau de dates prises de format string en format date
    convertDate();

    // Cookie de langue :
    let lang = getCookie("lang");
    logger(lang);
    if (lang === null) {
        lang = "fr";
        setCookie("lang", lang);
    }


    // Gestion des événements :
    let content = document.getElementById('content');

    content.addEventListener('click', (e) => {
        if (e.target.classList.contains('buttonCalendarNextMonth')) {
            nextMonth();
        }
        else if (e.target.classList.contains('buttonCalendarPreviousMonth')) {
            previousMonth();
        }
        else if (e.target.classList.contains('buttonCalendarClear')) {
            clearSelectionCalendar();
        }
        else if (e.target.classList.contains('buttonCalendarToday')) {
            drawCurrentMonth();
        }
        else if (e.target.classList.contains('calendarDay') || e.target.classList.contains('calendarDaySub')) {
            console.log(selectionStart);
            console.log(selectionEnd);
            console.log("-----");
            let day = e.target;
            if (e.target.classList.contains('calendarDaySub'))
                day = e.target.parentNode;

            if (day.classList.contains("disabled"))
                return;

            let dayNb = day.getElementsByTagName("div")[0].innerHTML;
            let monNb = day.parentNode.parentNode.getElementsByTagName("input")[0].value.split('-').map(Number)[1];
            let yeaNb = day.parentNode.parentNode.getElementsByTagName("input")[0].value.split('-').map(Number)[0];
            let clickedDay = new Date(yeaNb, monNb, dayNb);

            if (selectionStart == undefined) {
                selectionStart = new Date(yeaNb, monNb, dayNb);
            }
            else if (selectionEnd == undefined) {
                if (clickedDay.getTime() == selectionStart.getTime()) {
                    selectionEnd = selectionStart;
                    return;
                }

                // On vérifie qu'il n'y a pas de jour déjà reservé entre le jour de début de réservation et la fin;
                for (let a = 0; a < takenDate.length; a++) {
                    if (takenDate[a] > selectionStart && takenDate[a] < clickedDay || takenDate[a] < selectionStart && takenDate[a] > clickedDay)
                        return;
                }

                if (clickedDay < selectionStart) {
                    selectionEnd = selectionStart;
                    selectionStart = clickedDay;
                }
                else {
                    selectionEnd = clickedDay;
                }
            }

            else {
                if (clickedDay < selectionStart) {
                    for (let a = 0; a < takenDate.length; a++) {
                        if (takenDate[a] > clickedDay && takenDate[a] < selectionEnd)
                            return;
                    }
                    selectionStart = clickedDay;
                }

                else if (clickedDay > selectionEnd) {
                    for (let a = 0; a < takenDate.length; a++) {
                        if (takenDate[a] > selectionStart && takenDate[a] < clickedDay) {
                            return;
                        }
                    }
                    selectionEnd = clickedDay;
                }
                else if (clickedDay > selectionStart && clickedDay < selectionEnd) {
                    if (clickedDay.getTime() - selectionStart.getTime() < selectionEnd.getTime() - clickedDay.getTime())
                        selectionStart = clickedDay;
                    else
                        selectionEnd = clickedDay;
                }
                // else if (clickedDay.getTime() == selectionEnd.getTime() && clickedDay.getTime() == selectionStart.getTime())
                //     console.log("prout");
            }

            let a = document.getElementById("calendar").getElementsByTagName("input"); // Récupérer les mois affichés
            let temp = a[0].value.split('-').map(Number); // Convertir la date de format "YYYY-MM" en un tableau d'entiers
            let firstMonth = new Date(temp[0], temp[1], 1);
            temp = a[1].value.split('-').map(Number);
            let secondMonth = new Date(temp[0], temp[1], 1);

            console.log(selectionStart);
            console.log(selectionEnd);
            console.log("-----");
            drawCalendar(firstMonth, secondMonth);
        }
    });

    // Hover
    content.addEventListener('mouseover', (e) => {
        if (e.target.classList.contains('CalendarIconInfo')) {
            document.getElementsByClassName("calendarShortcuts")[0].style.display = "flex";
        }
        else {
            document.getElementsByClassName("calendarShortcuts")[0].style.display = "none";
        }
    });

    // Keypressed
    let keysPressed = {};

    document.body.addEventListener('keydown', (event) => {
        keysPressed[event.key] = true;

        // console.log(event.key);
        // Check if left or right arrow are pressed whith shift and if the user is not editing or selecting text
        if (keysPressed['ArrowLeft'] && window.event.shiftKey && document.activeElement.tagName == "BODY" && window.getSelection().anchorNode == null) { // Flèche de gauche
            previousMonth();
        }
        else if (keysPressed['ArrowRight'] && window.event.shiftKey && document.activeElement.tagName == "BODY" && window.getSelection().anchorNode == null) { // Flèche de gauche
            nextMonth();
        }
        else if (keysPressed['Backspace'] && window.event.shiftKey && document.activeElement.tagName == "BODY" && window.getSelection().anchorNode == null) { // Flèche de gauche
            clearSelectionCalendar();
        }
        else if (keysPressed['Enter'] && window.event.shiftKey && document.activeElement.tagName == "BODY" && window.getSelection().anchorNode == null) { // Flèche de gauche
            drawCurrentMonth();
        }
    });

    document.body.addEventListener('keyup', (event) => {
        delete keysPressed[event.key];
    });

    // Calendar
    if (document.getElementById("calendar") != undefined) {
        drawCurrentMonth();
    }
}

function calcDecallage(jourDeDepart) {
    if (jourDeDepart == 0)
        return 6;
    return jourDeDepart - 1;
}

function drawCalendar(firstMonth, secondMonth) {

    // CalendarTop
    let calendarContent = "<div id='calendarTop'>";
    calendarContent += "<img title='Mois précédant' class='buttonCalendarPreviousMonth' src='" + calendarIconLeftArrow + "' alt='Left'>";
    calendarContent += "<img title='Mois suivant' class='buttonCalendarNextMonth' src='" + calendarIconRightArrow + "' alt='Left'>";
    calendarContent += "</div>";
    // CalendarBody
    calendarContent += "<div id='calendarBody'>";
    calendarContent += drawMonth(firstMonth);
    calendarContent += drawMonth(secondMonth);
    calendarContent += "</div>";

    // CalendarBottom
    calendarContent += "<div id='calendarBottom'><div>";
    calendarContent += "<img title='Revenir au mois courant' class='buttonCalendarToday' src='" + calendarIconToday + "' alt='Left'>";
    calendarContent += "<img title='Effacer la sélection' class='buttonCalendarClear' src='" + calendarIconClear + "' alt='Left'>";
    calendarContent += "</div><div>";
    calendarContent += "<label>Raccourcis clavier</label>";
    calendarContent += "<img class='CalendarIconInfo' src='" + calendarIconInfo + "' alt='Left'>";

    calendarContent += "<div class=\"calendarShortcuts\">";
    calendarContent += "<div class=\"calendarShortcutsLine\"><label>⇧ + →</label><label>Passer au mois suivant</label></div>";
    calendarContent += "<div class=\"calendarShortcutsLine\"><label>⇧ + ←</label><label>Passer au mois précédent</label></div>";
    calendarContent += "<div class=\"calendarShortcutsLine\"><label>⇧ + ⌫</label><label>Supprimer la sélection active</label></div>";
    calendarContent += "<div class=\"calendarShortcutsLine\"><label>⇧ + ⏎</label><label>Afficher le mois courant</label></div>";
    calendarContent += "</div>";
    // calendarContent += "<div class=\"calendarShortcuts\">⇧ + →</div></div></div>";
    document.getElementById("calendar").innerHTML = calendarContent;
}

//TODO: Supprimer au click droit
//TODO: Ajouter des raccourcis clavier

function drawMonth(month) {
    let content = '<div class="calendarPart">';
    let nbOfDays = new Date(month.getFullYear(), month.getMonth() + 1, 0); // On recupère le nombre de jour dans le mois :
    let nbOfDaysOnScreen = 0;

    // Input caché qui indique le mois affiché
    content += '<input type="hidden" value="' + month.getFullYear() + "-" + month.getMonth() + '">';

    // Label du mois - Ex: Décembre 2023
    content += '<label>' + frenchYear[month.getMonth()] + ' ' + month.getFullYear() + '</label>';

    // Mois
    content += '<div class="calendarMonth"><div class="calendarHeader">';
    for (let a = 0; a < 7; a++) { // Ecriture du header
        content += '<div class="calendarDay disabled void">' + frenchWeek[a] + '</div>';
    }
    content += '</div>';

    for (let a = 0; a < calcDecallage(month.getDay()); a++) {  // Génération des (éventuels) espaces vides
        content += '<div class="calendarDay disabled void"><div></div></div>';
        nbOfDaysOnScreen++;
    }

    for (let a = 1; a < nbOfDays.getDate() + 1; a++) {
        let tempDay = new Date(month.getFullYear(), month.getMonth(), a);
        nbOfDaysOnScreen++;
        content += '<div class="calendarDay';
        if (tempDay.getTime() < Date.now())
            content += ' disabled';
        else if (takenDay.indexOf(month.getFullYear() + "-" + (month.getMonth() + 1) + "-" + a) !== -1) {
            content += ' disabled';
        }

        if (selectionStart != undefined) {
            if (tempDay.getTime() == selectionStart.getTime()) {
                content += ' calendarClicked';
            }
        }
        if (selectionEnd != undefined) {
            if (tempDay.getTime() == selectionStart.getTime()) {
                content += ' calendarStart calendarClicked';
            }

            if (tempDay.getTime() == selectionEnd.getTime()) {
                content += ' calendarEnd calendarClicked';
            }
            if (selectionEnd != undefined) {
                if (tempDay.getTime() == selectionEnd.getTime()) {
                    content += ' calendarEnd calendarClicked';
                }
                else if (tempDay.getTime() < selectionEnd.getTime() && tempDay.getTime() > selectionStart.getTime()) {
                    content += ' calendarClicked calendarMiddle';
                }
            }
        }

        content += '"><div class="calendarDaySub">' + a + '</div></div>';
    }
    for (let i = nbOfDaysOnScreen; i < 42; i++) {
        content += "<div class=\"calendarDay disabled void\"><div></div></div>";
    }
    content += "</div></div>";

    return content;
}

function nextMonth() {
    // console.log("Next Month");
    let a = document.getElementById("calendar").getElementsByTagName("input");
    let temp = a[1].value.split('-').map(Number); // Convertir la date de format "YYYY-MM" en un tableau d'entiers
    let firstMonth = new Date(temp[0], temp[1], 1);
    if (temp[1] == 11) {
        let secondMonth = new Date(temp[0] + 1, 0, 1);
    }
    let secondMonth = new Date(temp[0], temp[1] + 1, 1);
    drawCalendar(firstMonth, secondMonth);
}

function previousMonth() {
    let a = document.getElementById("calendar").getElementsByTagName("input");
    let temp = a[0].value.split('-').map(Number); // Convertir la date de format "YYYY-MM" en un tableau d'entiers
    let secondMonth = new Date(temp[0], temp[1], 1);

    if (temp[1] == 0) {
        let firstMonth = new Date(temp[0] - 1, 11, 1);
    }
    let firstMonth = new Date(temp[0], temp[1] - 1, 1);
    drawCalendar(firstMonth, secondMonth);
}

function convertDate() {
    takenDay.forEach(day => {
        takenDate.push(new Date(day.split("-")[0], day.split("-")[1] - 1, day.split("-")[2]));
    });
}

function clearSelectionCalendar() {
    selectionStart = undefined;
    selectionEnd = undefined;
    let month = document.getElementById("calendar").getElementsByTagName("input");
    let firstMonth = new Date(month[0].value.split("-")[0], month[0].value.split("-")[1], 1);
    let secondMonth = new Date(month[1].value.split("-")[0], month[1].value.split("-")[1], 1);
    drawCalendar(firstMonth, secondMonth);
}

function drawCurrentMonth() {
    logger("Current Month");
    let firstDay = new Date(today.getFullYear(), today.getMonth());

    if (firstDay.getMonth == 11)
        drawCalendar(firstDay, new Date(firstDay.getFullYear() + 1, 0));
    else
        drawCalendar(firstDay, new Date(firstDay.getFullYear(), firstDay.getMonth() + 1));
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


logger("assets.js loaded");
