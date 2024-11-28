import './bootstrap';

import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

$(document).ready(function(){
    $(".owl-carousel1").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: true,
        dots: true, 
        smartSpeed: 1000
    });
    $(".owl-carousel2").owlCarousel({
        items: 3,
        margin: 20,
        dots: true, 
        smartSpeed: 1000
    });
});
