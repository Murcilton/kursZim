import './bootstrap';

import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

function showNotification(message, type = 'info') {
  const notification = document.getElementById('customNotification');

  notification.textContent = message;

  notification.className = `notification ${type}`;

  notification.classList.remove('d-none');
  notification.classList.add('show');

  setTimeout(() => {
      notification.classList.remove('show');
      notification.classList.add('hide'); 
  }, 3000);
}

//======================================Корзина=====================================

document.addEventListener('DOMContentLoaded', () => {
  fetch('{{ route("cart.qty") }}')
      .then(response => response.json())
      .then(data => {
          document.querySelector('.mini-cart-qty').textContent = data.cart_qty;
      })
      .catch(error => console.error('Ошибка загрузки количества товаров:', error));
});

document.addEventListener('DOMContentLoaded', () => {
  const addToCartBtn = document.querySelector('.add-to-cart-btn');
  addToCartBtn.addEventListener('click', function (event) {
      event.preventDefault();

      const cruiseId = this.dataset.id; // Получаем ID из data-атрибута
      const qty = 1;

      // Отправка AJAX-запроса
      fetch(this.dataset.url, { // Используем data-url из кнопки
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': this.dataset.token // Передаем CSRF-токен
          },
          body: JSON.stringify({ cruise_id: cruiseId, qty: qty }) // Передаем cruise_id
      })
          .then(response => {
              if (!response.ok) throw new Error('Ошибка сети');
              return response.json();
          })
          .then(data => {
              if (data.success) {
                  // Обновляем количество товаров в бейдже
                  document.querySelector('.mini-cart-qty').textContent = data.cart_qty;
                  showNotification('Круиз добавлен в корзину!', 'success');
              } else {
                showNotification('Ошибка при добавлении в корзину.', 'error');
              }
          })
          .catch(error => {
              console.error('Ошибка:', error);
              showNotification('Ошибка при добавлении в корзину.', 'error');
          });
  });
});

document.addEventListener('DOMContentLoaded', () => {
  // Открытие модального окна корзины
  const burgerButton = document.querySelector('.burger-button');
  burgerButton.addEventListener('click', function () {
      const modalBody = document.querySelector('.cart-modal .modal-body');
      const url = this.dataset.url; // Получаем маршрут из data-атрибута

      modalBody.innerHTML = '<p>Загрузка...</p>';

      fetch(url)
          .then(response => response.text())
          .then(html => {
              console.log(html);
              modalBody.innerHTML = html;
              const cartModal = new bootstrap.Modal(document.getElementById('cart-modal'));
              cartModal.show();
          })
          .catch(error => {
              console.error('Ошибка загрузки корзины:', error);
              modalBody.innerHTML = '<p>Ошибка загрузки корзины. Попробуйте снова позже.</p>';
          });
  });

  // Очистка корзины
  window.clearCart = (clearUrl) => {
      fetch(clearUrl)
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  document.querySelector('.mini-cart-qty').textContent = 0;
                  document.querySelector('.cart-modal .modal-body').innerHTML = '<p>Корзина пуста.</p>';
              } else {
                showNotification(data.message || 'Ошибка при очистке корзины.', 'error');
              }
          })
          .catch(error => {
              console.error('Ошибка очистки корзины:', error);
              showNotification('Ошибка при очистке корзины.', 'error');
          });
  };
});

document.addEventListener('click', function (e) {
  if (e.target.classList.contains('cart-remove-item')) {
      const itemId = e.target.dataset.id;
      const delItemUrl = e.target.dataset.url;

      fetch(`${delItemUrl}/${itemId}`)
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  document.querySelector('.mini-cart-qty').textContent = data.cart_qty;
                  e.target.closest('li').remove();

                  if (data.cart_qty === 0) {
                      document.querySelector('.cart-modal .modal-body').innerHTML = '<p>Корзина пуста.</p>';
                  }
              } else {
                showNotification(data.message || 'Ошибка при удалении элемента.', 'error');
              }
          })
          .catch(error => {
              console.error('Ошибка при удалении элемента:', error);
              showNotification('Ошибка при удалении элемента.', 'error');
          });
  }
});



//====================================</Корзина>====================================

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


