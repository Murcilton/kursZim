@extends('layouts.layout')

@section('content')
<div class="alert alert-info" role="alert">
    Благодарим за регистрацию! Ссылка на подтверждение была отправлена на указанный адрес электронной почты.
</div>
<div>
    <div class="container">
        Ссылка не пришла?
        <form action="{{route('verification.send')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link ps-0">Отправить повторно</button>
        </form>
    </div>
    
</div>
@endsection