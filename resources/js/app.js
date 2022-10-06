import Alpine from 'alpinejs';

import {SliderControlTable} from './admin/slider';
import {SliderGroupControl} from './admin/slider_group';
import {ItemControlTable} from './admin/item';



try {
    require('./bootstrap');

    window.$ = window.jQuery = require('jquery');
    require('datatables.net');
    require('datatables.net-bs4');
    require('datatables.net-buttons');
    require('datatables.net-buttons-bs4');

    //slider destination
    if ($("#slider").length > 0) {
        new SliderControlTable('#slider_table');
    }

    //slider group control
    if ($("#sliderGroup").length > 0) {
        new SliderGroupControl('#sliderGroup_table');
    }


    //item  control
    if ($("#item").length > 0) {
        new ItemControlTable('#item_table');
    }


    window.Alpine = Alpine;

    Alpine.start();
} catch (e) {

}
