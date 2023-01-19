import './bootstrap';
import { initUtils } from './utils';
import { initAssets, selectionStart, selectionEnd} from './assets';

import '../css/utils.css'
import '../css/assets.css'

import.meta.glob([
    '../assets/**'
])

document.fonts.onloadingdone = () => {
    initUtils();
    initAssets();
}

// function init() {
//     console.log("init");
    
// }

// window.addEventListener('load', init);