import './bootstrap';
import { initUtils } from './utils';
import { initAssets } from './assets';


import '../css/utils.css'
import '../css/assets.css'

import.meta.glob([
    '../assets/**'
])

function init() {
    initUtils();
    initAssets();
}

window.addEventListener('load', init)