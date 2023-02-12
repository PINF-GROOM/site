import './bootstrap';
import { initUtils } from './utils';
import { initAssets, selectionStart, selectionEnd} from './calendar';
import { initHeader } from './header';
import { logger } from './logger'

import '../css/utils.css'
import '../css/assets.css'

import.meta.glob([
    '../assets/**'
])

function init(){
    logger("Init...")
    initUtils();
    initAssets();
    initHeader();
}

 if (import.meta.env.DEV) {
    document.fonts.load('1em Roboto').then(function (a) {
        setTimeout(() => {
            init();
        }, 500);
	});
} else {
    window.addEventListener('load', init);
}

