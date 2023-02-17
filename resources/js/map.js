import { logger } from './logger'

// Paris
var lat = 48.852969;
var lon = 2.349903;
var macarte = null;

export function initMap() {
    logger("initMap" , "info");
    macarte = L.map('map').setView([lat, lon], 11);
    // Link to data source
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a> - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);
}
