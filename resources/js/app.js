import "./bootstrap";
import $ from "jquery";
import Alpine from "alpinejs";
import "slick-carousel";
import "lazysizes";
import { Fancybox } from "@fancyapps/ui/dist/fancybox/fancybox.esm.js";
import Swal  from "sweetalert2";
import AOS from "aos";
import "flowbite";
import Swiper from 'swiper/bundle';

window.$ = window.jQuery = $;
window.AOS = AOS;
window.Fancybox = Fancybox;
window.Swal = Swal;
window.Alpine = Alpine;
window.Swiper = Swiper;
// Initialise jQuery
$(function () {

    // Any jQuery scripts...
    AOS.init({
        // once: true,
    });
    Fancybox.bind("[data-fancybox]", {});
    Alpine.start();
});
