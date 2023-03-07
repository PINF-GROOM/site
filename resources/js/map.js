import { logger } from './logger'

// Paris
var lat = 48.852969;
var lon = 2.349903;
var fixedMap = null;

export function initMap() {
    if (document.getElementById("mapfixed") != undefined) {
        document.getElementById("mapfixed").addEventListener("click", (e) => {
            document.getElementById("mapPopup").style.display = "flex";
            if (document.getElementById("map") != undefined) {
                map = L.map('map').setView([lat, lon], 11);
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a> - rendu <a href="//openstreetmap.fr">OSM France</a>',
                    dragging: false,
                    minZoom: 1,
                    maxZoom: 20
                }).addTo(map);
            }
        });
        document.getElementById("mapPopup").addEventListener("click", (e) => {
            // console.log(window.getComputedStyle(e.target)["cursor"] != grab);
            if (window.getComputedStyle(e.target)["cursor"] != "grab") {
                map.remove();
                document.getElementById("mapPopup").style.display = "none";
            }
        });

        logger("initMap", "info");
        fixedMap = L.map('mapfixed').setView([lat, lon], 11);
        // Link to data source
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a> - rendu <a href="//openstreetmap.fr">OSM France</a>',
            dragging: false,
            minZoom: 1,
            maxZoom: 20
        }).addTo(fixedMap);

        fixedMap.dragging.disable();
        fixedMap.touchZoom.disable();
        fixedMap.doubleClickZoom.disable();
        fixedMap.scrollWheelZoom.disable();
        fixedMap.boxZoom.disable();
        fixedMap.keyboard.disable();
    }
}
