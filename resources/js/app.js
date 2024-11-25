import './bootstrap';

import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        nav: true, 
        dots: true, 
        smartSpeed: 650
    });
});