import './bootstrap';

import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

window.scrollTo({
  top: 100,
  behavior: 'smooth'
});

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

document.addEventListener('DOMContentLoaded', () => {

  document.querySelectorAll('.destination-option').forEach(button => {
      button.addEventListener('click', () => {
          const destinationId = button.getAttribute('data-id');
          document.getElementById('destinationInput').value = destinationId;
          document.querySelector('.b1').innerText = button.innerText;

          const modalButton = document.getElementById('modalButton');
          modalButton.classList.add('selected');

          const modal = bootstrap.Modal.getInstance(document.getElementById('destinationModal'));
          modal.hide();
      });
  });

  document.querySelectorAll('.departure-option').forEach(button => {
      button.addEventListener('click', () => {
          const departureId = button.getAttribute('data-id');
          document.getElementById('departureInput').value = departureId;
          document.querySelector('.b2').innerText = button.innerText;

          const modalButton2 = document.getElementById('modalButton2');
          modalButton2.classList.add('selected');

          const modal = bootstrap.Modal.getInstance(document.getElementById('departureModal'));
          modal.hide();
      });
  });


  document.querySelectorAll('.date-option').forEach(button => {
      button.addEventListener('click', () => {
          const dateId = button.getAttribute('data-id');
          document.getElementById('dateInput').value = dateId;
          document.querySelector('.b3').innerText = button.innerText;

          const modalButton3 = document.getElementById('modalButton3');
          modalButton3.classList.add('selected');

          const modal = bootstrap.Modal.getInstance(document.getElementById('dateModal'));
          modal.hide();
      });
  });
});

window.addEventListener('load', () => {
  const preloader = document.getElementById('preloader');

  setTimeout(() => {
    preloader.style.opacity = '0';
    setTimeout(() => {
      preloader.style.display = 'none';
      document.querySelector('.main-container').style.display = 'block'; 
    }, 500); 
  }, 200); 
});


