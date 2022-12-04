const frenchWeek = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
const frenchYear = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

function init() {
    // Selects
    let selectTab = document.getElementsByClassName("select");
    for (i = 0; i < selectTab.length; i++) {
        selectTab[i].style.width = getComputedStyle(selectTab[i]).width;
        selectOption = selectTab[i].getElementsByClassName("selectOption");
        parentHeight = getComputedStyle(selectTab[i]).height;
        parentHeight = parentHeight.toString().slice(0, -2);
        for (y = 0; y < selectOption.length; y++) {
            selectOption[y].style.top = parseInt(parentHeight) * (y + 1) + "px";
            selectOption[y].style.height = parentHeight + "px";
            // Lorsqu'une option est cliquée :
            selectOption[y].addEventListener("click", function (e) {
                this.parentNode.getElementsByClassName("selectTitle")[0].querySelectorAll('label')[0].innerHTML = this.innerHTML;
                this.parentNode.querySelectorAll('input')[0].value = this.innerHTML;
            });
        }
        selectTab[i].addEventListener("click", function (e) {
            this.classList.toggle("selectActive");
            this.classList.toggle("selectInactive");
        });
    }
    document.addEventListener("click", closeAllSelect);

    // Checkboxes
    let checkTab = document.getElementsByClassName("checkBox");
    for (i = 0; i < checkTab.length; i++) {
        checkTab[i].addEventListener("click", function (e) {
            this.querySelectorAll('input')[0].checked = !this.querySelectorAll('input')[0].checked;
            this.querySelectorAll('div')[0].classList.toggle("checked");
        });
    }

    // Calendar
    // var today = new Date();
    // var dd = String(today.getDate()).padStart(2, '0');
    // var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    // var yyyy = today.getFullYear();
    // console.log(dd);
    // console.log(mm);
    // console.log(yyyy);
    // // let firstDay = new Date(2022, mm - 1, 1);
    // console.log(firstDay);
    // // console.log(firstDay.getDay());
    // console.log("Le premier du mois était un : " + frenchWeek[firstDay.getDay()]);

    // Dessin du calendrier :
    let today = new Date();
    let firstDay = new Date(today.getFullYear(), today.getMonth());
    let nbOfDays = new Date(today.getFullYear(), today.getMonth(), 0);

    let calendarContent = '<div class="calendarPart"><input type="hidden">';
    calendarContent += '<label>LABEL</label>';
    calendarContent += '<div class="calendarMonth"><div class="calendarHeader"><div class="calendarDay">L</div><div class="calendarDay">M</div><div class="calendarDay">M</div><div class="calendarDay">J</div><div class="calendarDay">V</div><div class="calendarDay">S</div><div class="calendarDay">D</div></div>';

    for (let a = 0; a < firstDay.getDay() -1; a++) {
        calendarContent += '<div class="calendarDay disabled"><div></div></div>';
    }
    for (let a = 1; a < nbOfDays.getDate() + 1; a++) {
        calendarContent += '<div class="calendarDay';
        if(a <= today.getDate())
            calendarContent += ' disabled';
        calendarContent += '"><div>' + a +  '</div></div>';
    }

    calendarContent += "</div></div>";

    calendarContent += '<div class="calendarPart"><input type="hidden"><label>LABEL</label><div class="calendarMonth"><div class="calendarHeader"><div class="calendarDay">L</div><div class="calendarDay">M</div><div class="calendarDay">M</div><div class="calendarDay">J</div><div class="calendarDay">V</div><div class="calendarDay">S</div><div class="calendarDay">D</div></div></div>';
    document.getElementById("calendar").innerHTML = calendarContent;

    // // Définition des labels : Nom du mois + année
    // document.getElementById("calendar").querySelectorAll('.calendarPart')[0].querySelector('label').innerHTML = frenchYear[(mm - 1) % 12] + " " + yyyy;
    // document.getElementById("calendar").querySelectorAll('.calendarPart')[1].querySelector('label').innerHTML = frenchYear[(mm) % 12] + " " + yyyy;
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