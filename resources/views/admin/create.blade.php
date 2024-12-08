@extends('layouts.layout')

@section('content')

<div class="container create-container create-container2">
    <h1>Создать круиз</h1>

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="price" class="">Цена</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="description" class="">Содержание</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <label for="date_id" class="">Даты</label>
        <select class="form-control" id="date_id" name="date_id" required> 
            @foreach ($availableDates as $date) 
                    <option value="{{ $date->id }}">{{ $date->date }}</option> 
            @endforeach 
        </select> 
        <label for="ship_id" class="">Корабли</label>
        <select class="form-control" id="ship_id" name="ship_id" required> 
            @foreach ($availableShips as $ship) 
                    <option value="{{ $ship->id }}">{{ $ship->name }}</option> 
            @endforeach 
        </select> 
        <label for="destination_id" class="">Направление</label>
        <select class="form-control" id="destination_id" name="destination_id" required> 
            @foreach ($availableDest as $dest) 
                <option value="{{ $dest->id }}">{{ $dest->name }}</option> 
            @endforeach 
        </select> 
        <label for="departure_id" class="">Отбытие из</label>
        <select class="form-control" id="departure_id" name="departure_id" required> 
            @foreach ($availableDep as $dep) 
                    <option value="{{ $dep->id }}">{{ $dep->name }}</option> 
            @endforeach 
        </select> 

        <label for="status" class="">Статус</label>
        <input class="form-control" value="" type="text" id="status" name="status">
        <label for="status" class="">Ночей</label>
        <input class="form-control" value="" type="text" id="nights" name="nights">

        <label for="hit" class="">Хит</label>
        <select class="form-control custom-select" name="hit" id="hit"> 
                <option value="0">Не хит</option> 
                <option value="1">Хит</option> 
        </select> 
        <div class="mb-3">
            <label for="sale" class="">Скидка (%)</label>
            <input type="number" class="form-control" id="sale" name="sale" required min="0" max="100">
            @error('price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="img" class="">Изображение</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>
        <div class="bt">
        <button type="submit" class="btnnav"><i class="fa-solid fa-check"></i></button>
    </div>
    </form>
</div>

@endsection
