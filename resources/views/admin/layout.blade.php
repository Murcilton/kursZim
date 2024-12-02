<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    @vite('resources/css/main.css')

    <title>@yield('title', 'Admin Panel')</title>
</head>
<body>

@include('admin.navbar')

<div class="wrapper mt-5">
    <div class="container">
        <div class="row">

            @yield('content')

        </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /wrapper -->

<!--Alert-->

<style>
    .notification {
        position: fixed;
        top: 20%;
        left: 82%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid #007bff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 9999;

    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- @vite('resources/js/main.js') --}}
    <script src="{{asset('assets\front\js\main.js')}}"></script>
</body>
</html>
