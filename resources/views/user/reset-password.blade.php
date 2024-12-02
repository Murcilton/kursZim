@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-mb-3">
            <h1 class="h2">Сброс пароля</h1>

            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="from-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" class="from-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Password" value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                </div>

                <button type="submit" class="btn btn-primary">Изменить пароль</button>

            </form>
        </div>
    </div>
@endsection
