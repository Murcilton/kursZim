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

const items = document.querySelectorAll('.gallery-item');
items.forEach(item => {
  item.addEventListener('mouseover', () => {
    items.forEach(otherItem => {
      if (otherItem === item) {
        otherItem.style.transform = 'translateY(-3px)'; 
      } else {
        otherItem.style.transform = 'translateY(3px)'; 
        otherItem.style.filter = 'blur(1.2px)';
      }
    });
  });

  item.addEventListener('mouseout', () => {
    items.forEach(otherItem => {
      otherItem.style.transform = 'translateY(0)';
      otherItem.style.filter = 'blur(0)';
    });
  });
});

const items2 = document.querySelectorAll('.card-item');
items2.forEach(item => {
  item.addEventListener('mouseover', () => {
    items2.forEach(otherItem => {
      if (otherItem === item) {
        otherItem.style.transform = 'translateY(-3px)'; 
      } else {
        otherItem.style.transform = 'translateY(3px)'; 
        otherItem.style.filter = 'blur(2px)';
      }
    });
  });

  item.addEventListener('mouseout', () => {
    items2.forEach(otherItem => {
      otherItem.style.transform = 'translateY(0)';
      otherItem.style.filter = 'blur(0)';
    });
  });
});