<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('storage\owlcarousel\owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/owlcarousel/owl.theme.default.min.css') }}">


    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/app.scss'])

</head>

<body>
    @include('layouts.header')
    <div class="wrapper mt-5 main-container">
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
    
<div class="notification d-none" id="customNotification">
</div>


        @yield('content')
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
