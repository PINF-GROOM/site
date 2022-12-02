function init() {
    console.log("init");
    let selectTab = document.getElementsByClassName("select");
    for (i = 0; i < selectTab.length; i++) {
        selectOption = selectTab[i].getElementsByClassName("selectOption");
        parentHeight = getComputedStyle(selectTab[i]).height;
        parentHeight = parentHeight.toString().slice(0,-2);
        for(y = 0; y < selectOption.length; y ++){
            selectOption[y].style.top = (parseInt(parentHeight)+20) * (y+1) + "px";
            selectOption[y].style.height = parentHeight + "px";
        }
        selectTab[i].addEventListener("click", function (e) {
            this.classList.toggle("selectActive");
            this.classList.toggle("selectInactive");
            console.log("Clicked");
        });
    }
}