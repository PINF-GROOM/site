const frenchWeek = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];
const frenchYear = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
const takenDay = ['2022-12-20', '2022-12-21', '2022-12-22', '2023-1-22'];
let languageStatus = 0;
let today = new Date();

function initAssets() {

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

    // Calendar
    let firstDay = new Date(today.getFullYear(), today.getMonth());
    console.log(firstDay.getMonth());
    if (firstDay.getMonth == 11)
        drawCalendar(firstDay, new Date(firstDay.getFullYear() + 1, 0));
    else
        drawCalendar(firstDay, new Date(firstDay.getFullYear(), firstDay.getMonth() + 1));




    // for (let a = 0; a < calcDecallage(firstDay.getDay()); a++) {
    //     calendarContent += '<div class="calendarDay disabled"><div></div></div>';
    // }
    // for (let a = 1; a < nbOfDays.getDate() + 1; a++) {
    //     calendarContent += '<div class="calendarDay';
    //     if (a <= today.getDate())
    //         calendarContent += ' disabled';
    //     else if (takenDay.indexOf(firstDay.getFullYear() + "-" + (firstDay.getMonth() + 1) + "-" + a) !== -1) {
    //         calendarContent += ' disabled';
    //     }
    //     calendarContent += '"><div>' + a + '</div></div>';
    // }
    // calendarContent += "</div></div>"; // Pour cloturer le premier calendrier


    // // Mois suivant : 
    // if (today.getMonth == 11) {
    //     firstDay = new Date(today.getFullYear() + 1, 0);
    //     nbOfDays = new Date(today.getFullYear() + 1, 1, 0);
    // }
    // else {
    //     firstDay = new Date(today.getFullYear(), today.getMonth() + 1);
    //     nbOfDays = new Date(today.getFullYear(), today.getMonth() + 2, 0);
    // }

    // calendarContent += '<div class="calendarPart"><input type="hidden" value="' + firstDay.getFullYear() + "-" + firstDay.getMonth() + '">';
    // calendarContent += '<label>' + frenchYear[firstDay.getMonth()] + ' ' + firstDay.getFullYear() + '</label>';
    // calendarContent += '<div class="calendarMonth"><div class="calendarHeader"><div class="calendarDay disabled">L</div><div class="calendarDay disabled">M</div><div class="calendarDay disabled">M</div><div class="calendarDay disabled">J</div><div class="calendarDay disabled">V</div><div class="calendarDay disabled">S</div><div class="calendarDay disabled">D</div></div>';

    // for (let a = 0; a < calcDecallage(firstDay.getDay()); a++) {
    //     calendarContent += '<div class="calendarDay disabled"><div></div></div>';
    // }
    // for (let a = 1; a < nbOfDays.getDate() + 1; a++) {
    //     calendarContent += '<div class="calendarDay';
    //     if (takenDay.indexOf(firstDay.getFullYear() + "-" + (firstDay.getMonth() + 1) + "-" + a) !== -1) {
    //         calendarContent += ' disabled';
    //     }
    //     calendarContent += '"><div>' + a + '</div></div>';
    // }
    // calendarContent += "</div></div>"; // Pour cloturer le second calendrier
    // try {
    //     document.getElementById("calendar").innerHTML = calendarContent;
    // }
    // catch {
    //     return;
    // }

    // let dayTab = document.getElementsByClassName("calendarDay");
    // for (let i = 0; i < dayTab.length; i++) {
    //     dayTab[i].addEventListener("click", function (e) {
    //         if (this.classList.contains("disabled"))
    //             return;
    //         if (startDay === undefined) {
    //             startDay = new Date(this.parentNode.parentNode.querySelector('input').value.split('-')[0], this.parentNode.parentNode.querySelector('input').value.split('-')[1], this.querySelector('div').innerHTML);
    //             endDay = startDay;

    //             this.classList.toggle("calendarClicked");
    //             startPos = this;
    //             endPos = this;
    //             return;
    //         }
    //         let clickedDay = new Date(this.parentNode.parentNode.querySelector('input').value.split('-')[0], this.parentNode.parentNode.querySelector('input').value.split('-')[1], this.querySelector('div').innerHTML);

    //         if (startDay.getTime() === clickedDay.getTime() && endDay.getTime() === clickedDay.getTime()) {
    //             this.classList.toggle("calendarClicked");
    //             startDay = undefined;
    //             endDay = undefined;
    //         }
    //         // if(startDay > clickedDay){
    //         //     startDay = clickedDay;
    //         //     this.classList.toggle("calendarClicked");
    //         // }
    //         if (endDay < clickedDay) {
    //             if (endDay.getFullYear === clickedDay.getFullYear && endDay.getMonth === clickedDay.getMonth) {
    //                 let flag = 0;
    //                 let otherDay = this.parentNode.querySelectorAll(".calendarDay");
    //                 for (let a = 0; a < otherDay.length; a++) {
    //                     if (otherDay[a] == startPos) {
    //                         flag = 1;
    //                     }
    //                     if (otherDay[a].classList.contains("disabled") && flag)
    //                         return;
    //                     if (otherDay[a] == this) {
    //                         break;
    //                     }
    //                 }
    //                 flag = 0;
    //                 for (let a = 0; a < otherDay.length; a++) {
    //                     if (otherDay[a] == startPos) {
    //                         otherDay[a].classList.add("calendarStart");
    //                         flag = 1;
    //                     }
    //                     else if (otherDay[a] == this) {
    //                         break;
    //                     }
    //                     else if (flag) {
    //                         otherDay[a].classList.add("calendarMiddle");
    //                         otherDay[a].classList.remove("calendarEnd");

    //                     }
    //                 }
    //                 this.classList.toggle("calendarClicked");
    //                 this.classList.add("calendarEnd");
    //                 endDay = clickedDay;
    //                 endPos = this;
    //             }
    //         }
    //         else if (startDay > clickedDay) {
    //             if (endDay.getFullYear === clickedDay.getFullYear && endDay.getMonth === clickedDay.getMonth) {
    //                 let flag = 0;
    //                 let otherDay = this.parentNode.querySelectorAll(".calendarDay");
    //                 for (let a = 0; a < otherDay.length; a++) {
    //                     if (otherDay[a] == startPos) {
    //                         flag = 1;
    //                     }
    //                     if (otherDay[a].classList.contains("disabled") && flag)
    //                         return;
    //                     if (otherDay[a] == this) {
    //                         break;
    //                     }
    //                 }
    //                 flag = 0;
    //                 for (let a = 0; a < otherDay.length; a++) {
    //                     if (otherDay[a] == this) {
    //                         otherDay[a].classList.add("calendarStart");
    //                         flag = 1;
    //                     }
    //                     else if (otherDay[a] == endPos) {
    //                         break;
    //                     }
    //                     else if (flag) {
    //                         otherDay[a].classList.add("calendarMiddle");
    //                         otherDay[a].classList.remove("calendarStart");

    //                     }
    //                 }
    //                 this.classList.toggle("calendarClicked");
    //                 this.classList.add("calendarStart");
    //                 startDay = clickedDay;
    //                 startPos = this;
    //             }
    //         }

    //     });
    // }
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

//TODO: Passer les mois (par la date du premier jour du mois)
function drawCalendar(firstMonth, secondMonth) {
    console.log(firstMonth);
    console.log(secondMonth);

    let calendarContent = '<div class="calendarPart">';
    let nbOfDays = new Date(firstMonth.getFullYear(), firstMonth.getMonth() + 1, 0);
    // Premier mois (mois actuel)
    calendarContent += '<input type="hidden" value="' + firstMonth.getFullYear() + "-" + firstMonth.getMonth() + '">';
    calendarContent += '<label>' + frenchYear[firstMonth.getMonth()] + ' ' + firstMonth.getFullYear() + '</label>';
    calendarContent += '<div class="calendarMonth"><div class="calendarHeader">';
    for (let a = 0; a < 7; a++)
        calendarContent += '<div class="calendarDay disabled void">' + frenchWeek[a] + '</div>';
    calendarContent += '</div>'; // On fini le header du mois

    for (let a = 0; a < calcDecallage(firstMonth.getDay()); a++)  // Génération des (éventuels) espaces vides
        calendarContent += '<div class="calendarDay disabled void"><div></div></div>';

    for (let a = 1; a < nbOfDays.getDate() + 1; a++) {
        calendarContent += '<div class="calendarDay';
        if (a <= today.getDate())
            calendarContent += ' disabled';
        else if (takenDay.indexOf(firstMonth.getFullYear() + "-" + (firstMonth.getMonth() + 1) + "-" + a) !== -1) {
            calendarContent += ' disabled';
        }
        calendarContent += '"><div>' + a + '</div></div>';
    }
    calendarContent += "</div></div>"; // Pour cloturer le premier calendrier

    // calendarContent = '<div class="calendarPart">';
    // today = new Date();


    // firstDay = new Date(today.getFullYear(), today.getMonth());
    // nbOfDays = new Date(today.getFullYear(), today.getMonth() + 1, 0);
    // // Premier mois (mois actuel)
    // calendarContent += '<input type="hidden" value="' + today.getFullYear() + "-" + today.getMonth() + '">';
    // calendarContent += '<label>' + frenchYear[today.getMonth()] + ' ' + today.getFullYear() + '</label>';
    // calendarContent += '<div class="calendarMonth"><div class="calendarHeader">';
    // for (let a = 0; a < 7; a++)
    //     calendarContent += '<div class="calendarDay disabled">' + frenchWeek[a] + '</div>';
    // calendarContent += '</div>'; // On fini le header du mois

    // for (let a = 0; a < calcDecallage(firstDay.getDay()); a++) { // Génération des (éventuels) espaces vides
    //     calendarContent += '<div class="calendarDay disabled"><div></div></div>';
    // }
    // for (let a = 1; a < nbOfDays.getDate() + 1; a++) {
    //     calendarContent += '<div class="calendarDay';
    //     if (a <= today.getDate())
    //         calendarContent += ' disabled';
    //     else if (takenDay.indexOf(firstDay.getFullYear() + "-" + (firstDay.getMonth() + 1) + "-" + a) !== -1) {
    //         calendarContent += ' disabled';
    //     }
    //     calendarContent += '"><div>' + a + '</div></div>';
    // }
    // calendarContent += "</div></div>"; // Pour cloturer le premier calendrier


    document.getElementById("calendar").innerHTML = calendarContent;
}

//TODO: changer le status des cases vides en 'void'
//TODO: Pour highlight, parcourir toutes les cases entre début et fin en vérifiant si c'est possible
//      Si oui, on ajoute les classes partout ou c'est nécessaire (tester si void)
//TODO: Pour parcourir : vérifier mois actif à l'écran
//TODO: Au changement de mois : réafficher sélection active
//TODO: Cliquer pour modifier emplacement
//TODO: Bouton pour supprimer sélection
//TODO: Supprimer pour au click droit