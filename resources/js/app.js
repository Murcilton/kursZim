import './bootstrap';

import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';
import Swiper from 'swiper';

// Back To Top =================================================

const backToTopButton = document.getElementById('backToTop');

window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopButton.style.display = "block";
    } else {
        backToTopButton.style.display = "none";
    }
};

backToTopButton.onclick = function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};

// ============================================================

document.addEventListener('DOMContentLoaded', () => {
  const burgerMenuContent = document.querySelector('.burger-menu-content');
  const burgerToggle = document.querySelector('.burger-menu-toggle');
  const headerNavItems = Array.from(document.querySelectorAll('.headernav > *:not(.logo-container)'));

  const updateMenu = () => {
      const isMobile = window.innerWidth <= 820;

      if (isMobile) {
          headerNavItems.forEach(item => burgerMenuContent.appendChild(item));
      } else {
          headerNavItems.forEach(item => {
              const parent = item.dataset.originalParent || '.headernav';
              document.querySelector(parent).appendChild(item);
          });
      }
  };

  // Добавляем оригинальные родители для восстановления
  headerNavItems.forEach(item => {
      item.dataset.originalParent = item.parentElement.className;
  });

  // Обновляем меню при загрузке и изменении размера окна
  updateMenu();
  window.addEventListener('resize', updateMenu);

  // Открытие/закрытие бургер-меню
  burgerToggle.addEventListener('click', () => {
      burgerMenuContent.classList.toggle('active');
  });
});


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

document.addEventListener('click', function (e) {
  if (e.target.classList.contains('cart-order-item')) {
      const cruiseId = e.target.dataset.id;
      const url = e.target.dataset.url;

      fetch(url, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          },
          body: JSON.stringify({ cruise_order_id: cruiseId }),
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              showNotification('Круиз успешно забронирован!', 'success');
          } else {
              showNotification(data.message || 'Ошибка оформления заказа.', 'error');
          }
      })
      .catch(error => {
          console.error('Ошибка оформления заказа:', error);
          showNotification('Ошибка оформления заказа.', 'error');
      });
  }
});

document.addEventListener('DOMContentLoaded', () => {
  fetch('{{ route("cart.qty") }}')
      .then(response => response.json())
      .then(data => {
          document.querySelector('.mini-cart-qty').textContent = data.cart_qty;
      })
      .catch(error => console.error('Ошибка загрузки количества товаров:', error));
});

document.addEventListener('DOMContentLoaded', () => {
  document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('add-to-cart-btn')) {
      event.preventDefault();

      const cruiseId = event.target.dataset.id; 
      const qty = 1;  

      fetch(event.target.dataset.url, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': event.target.dataset.token 
          },
          body: JSON.stringify({ cruise_id: cruiseId, qty: qty })
      })
          .then(response => {
              if (!response.ok) throw new Error('Ошибка сети');
              return response.json();
          })
          .then(data => {
              if (data.success) {
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
    }
  });
});
document.addEventListener('DOMContentLoaded', () => {
  // Открытие модального окна корзины
  const burgerButton = document.querySelector('.burger-button');
  burgerButton.addEventListener('click', function () {
      const modalBody = document.querySelector('.cart-modal .modal-body');
      const url = this.dataset.url; 

      modalBody.innerHTML = '<p>Загрузка...</p>';

      fetch(url)
          .then(response => response.text())
          .then(html => {
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
        smartSpeed: 1000,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
    });
    $(".owl-carousel2").owlCarousel({
        items: 3,
        responsive: {
          0: {
            items: 1 // Для экранов меньше 522px
        },
        522: {
            items: 2 // Для экранов от 522px
        },
        768: {
            items: 3 // Для экранов от 768px
        },
        },
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


