const frenchYear = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
const takenDay = ['2022-12-20', '2022-12-21', '2022-12-22', '2023-1-22'];
let takenDate = [];

const fr = {
    "dayNames": ['L', 'M', 'M', 'J', 'V', 'S', 'D'],
    "monthNames": ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
}

const en = {
    "dayNames": ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
    "monthNames": ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
}

const langTranslations = {
    'fr': fr,
    'en': en
}

let languageStatus = 0;
let today = new Date();

let selectionStart;
let selectionEnd;

function initAssets() {
    // Convertir le tableau de dates prises de format string en format date
    convertDate(); // TODO3: quid de pas de date ?

    // if (document.getElementById("languageChoice") !== undefined) {
    //     document.addEventListener("click", function (e) {
    //         // if (e.target.classList.contains("langSelector")){
    //             if (!document.getElementById("languageChoice").classList.contains("languageShown"))
    //                 showLanguage();
    //             else
    //                 closeLanguage();
    //         // }
    //         // else {
    //         //     if (document.getElementById("languageChoice").classList.contains("languageShown"))
    //         //         closeLanguage();
    //         // }
    //     });
    // }

    // Clickw
    if (document.getElementById("languageChoice") !== undefined) {
        langSelectors = document.getElementsByClassName("langSelector");
        console.log(langSelectors);
        for(let a = 0; a < langSelectors.length; a++){
            langSelectors[a].addEventListener("click", function (e) {
                console.log("Clické");
            });
        }
    }

    // Calendar
    if (document.getElementById("calendar") != undefined)
        drawCurrentMonth();
}

function calcDecallage(jourDeDepart) {
    if (jourDeDepart == 0)
        return 6;
    return jourDeDepart - 1;
}

function toggleLanguage() {
    if (!document.getElementById("languageChoice").classList.contains("languageShown"))
        showLanguage();
    else
        closeLanguage();
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

    let calendarContent = "";
    calendarContent += drawMonth(firstMonth);
    calendarContent += drawMonth(secondMonth);
    document.getElementById("calendar").innerHTML = calendarContent;


    calDays = document.getElementsByClassName("calendarDay");
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


//TODO: Supprimer au click droit ?

function drawMonth(month) {
    let content = '<div class="calendarPart">';
    let nbOfDays = new Date(month.getFullYear(), month.getMonth() + 1, 0); // On recupère le nombre de jour dans le mois :

    // Input caché qui indique le mois affiché
    content += '<input type="hidden" value="' + month.getFullYear() + "-" + month.getMonth() + '">';

    // Label du mois - Ex: Décembre 2023
    content += '<label>' + langTranslations[lang].monthNames[month.getMonth()] + ' ' + month.getFullYear() + '</label>';

    // Mois
    content += '<div class="calendarMonth"><div class="calendarHeader">';
    for (let a = 0; a < 7; a++) { // Ecriture du header
        content += '<div class="calendarDay disabled void">' + langTranslations[lang].dayNames[a] + '</div>';
    }
    content += '</div>';

    for (let a = 0; a < calcDecallage(month.getDay()); a++)  // Génération des (éventuels) espaces vides
        content += '<div class="calendarDay disabled void"><div></div></div>';

    for (let a = 1; a < nbOfDays.getDate() + 1; a++) {
        tempDay = new Date(month.getFullYear(), month.getMonth(), a);
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
    content += "</div></div>";

    return content;
}

function nextMonth() {
    let a = document.getElementById("calendar").getElementsByTagName("input");
    let temp = a[1].value.split('-').map(Number); // Convertir la date de format "YYYY-MM" en un tableau d'entiers
    let firstMonth = new Date(temp[0], temp[1], 1);
    if (temp[1] == 11) {
        let secondMonth = new Date(temp[0] + 1, 0, 1);
    }
    let secondMonth = new Date(temp[0], temp[1] + 1, 1);
    drawCalendar(firstMonth, secondMonth);
}

function lastMonth() {
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
    firstMonth = new Date(month[0].value.split("-")[0], month[0].value.split("-")[1], 1);
    secondMonth = new Date(month[1].value.split("-")[0], month[1].value.split("-")[1], 1);
    drawCalendar(firstMonth, secondMonth);
}

function drawCurrentMonth() {
    let firstDay = new Date(today.getFullYear(), today.getMonth());

    if (firstDay.getMonth == 11)
        drawCalendar(firstDay, new Date(firstDay.getFullYear() + 1, 0));
    else
        drawCalendar(firstDay, new Date(firstDay.getFullYear(), firstDay.getMonth() + 1));
}