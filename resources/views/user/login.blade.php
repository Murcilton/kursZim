@extends('layouts.layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="register-wrapper content-wrapper d-flex align-items-center justify-content-center">
    <div class="register-card">
        <div class="register-logo">
            <ul class="register-logo-banner">
                <li><img src="{{ url('storage/GUI/Logo Auth.svg') }}" alt="" loading="lazy"></li>
                <li><p>Авторизация пользователя <span class="custom">Superbia Maris</span></p></li>
            </ul>
        </div>
        <form action="{{ route('login') }}" method='post'>
            @csrf
            <div class="card-body">

                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text" style="height: 100%">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Пароль" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text" style="height: 100%">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col register-submit">
                        <button type="submit" class="btnmodal btn-blok">Авторизоваться</button>
                    </div>
                </div>
                <a href="{{ route('password.request') }}" class="ms-2">Забыли пароль?</a>
            </div>
        </form>
    </div>
</div>

@endsection