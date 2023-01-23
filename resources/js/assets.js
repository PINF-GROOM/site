import calendarIconLeftArrow from '/resources/assets/icons/calendar/leftArrow.svg'
import calendarIconRightArrow from '/resources/assets/icons/calendar/rightArrow.svg'
import calendarIconToday from '/resources/assets/icons/calendar/today.svg'
import calendarIconClear from '/resources/assets/icons/calendar/clear.svg'
import calendarIconInfo from '/resources/assets/icons/calendar/info.svg'

export const frenchWeek = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];
export const frenchYear = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
export const takenDay = ['2022-12-20', '2022-12-21', '2022-12-22', '2023-1-22'];
export let takenDate = [];

export let languageStatus = 0;
export let today = new Date();

export let selectionStart;
export let selectionEnd;

export function initAssets() {
    console.log("Initializing assets.js...")

    // Convertir le tableau de dates prises de format string en format date
    convertDate();

    // if (document.getElementById("languageChoice") !== undefined) {
    //     document.addEventListener("click", function (e) {
    //         console.log(e.target);
    //         if (e.target == document.getElementById("languageIcon") || e.target == document.getElementById("languageIcon").querySelector('svg') || e.target == document.getElementById("languageIcon").querySelector('path')) {
    //             if (!document.getElementById("languageChoice").classList.contains("languageShown"))
    //                 showLanguage();
    //             else
    //                 closeLanguage();
    //         }
    //         else{
    //             if(document.getElementById("languageChoice").classList.contains("languageShown"))
    //                 closeLanguage();
    //         }
    //     });
    // }    

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
    });

    content.addEventListener('mouseover', (e) => {
        if (e.target.classList.contains('CalendarIconInfo')) {
            document.getElementsByClassName("calendarShortcuts")[0].style.display = "flex";
        }
        else{
            document.getElementsByClassName("calendarShortcuts")[0].style.display = "none";
        }
    });

    // Calendar
    if (document.getElementById("calendar") != undefined)
        drawCurrentMonth();
}

function calcDecallage(jourDeDepart) {
    if (jourDeDepart == 0)
        return 6;
    return jourDeDepart - 1;
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
    calendarContent += "<label>Raccourcis</label>";
    calendarContent += "<img class='CalendarIconInfo' src='" + calendarIconInfo + "' alt='Left'>";

    calendarContent += "<div class=\"calendarShortcuts\"><div class=\"calendarShortcutsLine\"><label>⇧ + →</label><label>Passer au mois suivant</label></div><div class=\"calendarShortcutsLine\"><label>⇧ + ←</label><label>Passer au mois précédent</label></div></div>";
    // calendarContent += "<div class=\"calendarShortcuts\">⇧ + →</div></div></div>";
    document.getElementById("calendar").innerHTML = calendarContent;


    let calDays = document.getElementsByClassName("calendarDay");
    for (let a = 0; a < calDays.length; a++) {
        calDays[a].addEventListener("click", function (e) {
            let day = e.target;
            if (e.target.parentNode.classList.contains("calendarDay"))
                day = e.target.parentNode;

            // On vérifie que le jour est bien disponible ou réservable
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
            }
            drawCalendar(firstMonth, secondMonth);
        });
    }
}

//TODO: Supprimer au click droit
//TODO: Raccourcis clavier

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

        content += '"><div>' + a + '</div></div>';
    }
    for (let i = nbOfDaysOnScreen; i < 42; i++) {
        content += "<div class=\"calendarDay disabled void\"><div></div></div>";
    }
    content += "</div></div>";

    return content;
}

export function nextMonth() {
    let a = document.getElementById("calendar").getElementsByTagName("input");
    let temp = a[1].value.split('-').map(Number); // Convertir la date de format "YYYY-MM" en un tableau d'entiers
    let firstMonth = new Date(temp[0], temp[1], 1);
    if (temp[1] == 11) {
        let secondMonth = new Date(temp[0] + 1, 0, 1);
    }
    let secondMonth = new Date(temp[0], temp[1] + 1, 1);
    drawCalendar(firstMonth, secondMonth);
}

export function previousMonth() {
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

export function clearSelectionCalendar() {
    selectionStart = undefined;
    selectionEnd = undefined;
    let month = document.getElementById("calendar").getElementsByTagName("input");
    let firstMonth = new Date(month[0].value.split("-")[0], month[0].value.split("-")[1], 1);
    let secondMonth = new Date(month[1].value.split("-")[0], month[1].value.split("-")[1], 1);
    drawCalendar(firstMonth, secondMonth);
}

export function drawCurrentMonth() {
    let firstDay = new Date(today.getFullYear(), today.getMonth());

    if (firstDay.getMonth == 11)
        drawCalendar(firstDay, new Date(firstDay.getFullYear() + 1, 0));
    else
        drawCalendar(firstDay, new Date(firstDay.getFullYear(), firstDay.getMonth() + 1));
}

console.log("assets.js loaded");