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

<div class="content-wrapper d-flex align-items-center justify-content-center" style="height: 50vh; width: 100vh">
    <div class="card" style="width: 400px;">
        <div class="card-header">
            <h3 class="card-title">Авторизация</h3>
          </div>
        <form action="{{ route('login') }}" method='post'>
            @csrf
            <div class="card-body">

                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Пароль" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-blok">Авторизоваться</button>
                    </div>
                </div>
                <a href="{{ route('password.request') }}" class="ms-2">Забыли пароль?</a>
            </div>
        </form>
    </div>
</div>

@endsection