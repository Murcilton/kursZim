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
<h1 class="h2">Восстановление пароля</h1>
<p>Введите адрес электронной почты для сброса текущего пароля</p>

<form action="{{ route('password.email') }}" method="post">
@csrf
<div class="mb-3">
<label for="email" class="form-label">Email</label>
<input type="email" name="email" class="from-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}">
@error('email')
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
</div>
<button type="submit" class="btn btn-primary">Отправить</button>
</form>

@endsection