<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Superbia maris</title>
    <link rel="icon" href="{{ url('storage/img\Icon Logo.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('storage\owlcarousel\owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/owlcarousel/owl.theme.default.min.css') }}">


    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/app.scss'])

</head>

<body>
    <div class="custom-shape-divider-top-1734869968">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>
    @include('layouts.header')
    <div class="main-container">
        @if ($errors->any())
            <div class="alert alert-danger" style="position: fixed">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
        <script>
            showNotification('{{ session('success') }}', 'success');
        </script>
    @endif
        <!-- Modal -->
        <div class="cart-modal-container">
            <div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
                <div class="modal-dialog cart-dialog modal-lg">
                    <div class="modal-content cart-content">
                        <div class="modal-header cart-header">
                            <h5 class="modal-title cart-title" id="cartModalLabel">Корзина</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body cart-body">
                            <p>Загрузка...</p>
                        </div>
                        <div class="modal-footer cart-footer">
                            <button type="button" onclick="clearCart('{{ route('cart.clear') }}')" class="cart-clear"><i class="fa-solid fa-trash" style="color: #ffffff;"></i>Очистить</button>
                            <button type="button" class="cart-close" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<div class="notification d-none" id="customNotification"></div>
        @yield('content')

        <button id="backToTop" class="back-to-top"><i class="fa-solid fa-arrow-up fa-lg"></i></button>

        <footer>
            <div class="footer">
                <div class="n">
                    <div class="container footer-container">
                        <p class="col-md-4 mb-0 text-body-secondary">© 2024 Superbia Maris, Inc</p>
                        
                        <a href="#" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                            <img src="http://localhost/storage/GUI/Logo Full.svg" alt="" title="" style="width: 40px" loading="lazy">
                        </a>
                        
                        <ul class="nav col-md-4 justify-content-end">
                            <li class="nav-item"><a href="{{ route('about-us') }}" class="nav-link px-2 text-body-secondary">О нас</a></li> 
                            
                        </ul>
                    </div>
                    
                    <img class="footer-svg" src="{{ url('storage/GUI/podval.svg') }}" alt="" title=""
                    style="" loading="lazy"/>
                </div>

            </div>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="{{ asset('storage/owlcarousel/owl.carousel.min.js') }}"></script>

    <div id="preloader">
        <div class="spinner"></div>
    </div>


</body>

</html>
