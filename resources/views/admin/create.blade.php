@extends('layouts.layout')

@section('content')

<div class="container create-container">
    <h1>Создать круиз</h1>

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Содержание</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <label for="date_id" class="form-label">Даты</label>
        <select class="form-control" id="date_id" name="date_id" required> 
            @foreach ($availableDates as $date) 
                    <option value="{{ $date->id }}">{{ $date->date }}</option> 
            @endforeach 
        </select> 
        <label for="ship_id" class="form-label">Корабли</label>
        <select class="form-control" id="ship_id" name="ship_id" required> 
            @foreach ($availableShips as $ship) 
                    <option value="{{ $ship->id }}">{{ $ship->name }}</option> 
            @endforeach 
        </select> 
        <label for="destination_id" class="form-label">Направление</label>
        <select class="form-control" id="destination_id" name="destination_id" required> 
            @foreach ($availableDest as $dest) 
                <option value="{{ $dest->id }}">{{ $dest->name }}</option> 
            @endforeach 
        </select> 
        <label for="departure_id" class="form-label">Отбытие из</label>
        <select class="form-control" id="departure_id" name="departure_id" required> 
            @foreach ($availableDep as $dep) 
                    <option value="{{ $dep->id }}">{{ $dep->name }}</option> 
            @endforeach 
        </select> 

        <label for="status" class="form-label">Статус</label>
        <input class="form-control" value="" type="text" id="status" name="status">
        <label for="status" class="form-label">Ночей</label>
        <input class="form-control" value="" type="text" id="nights" name="nights">

        
        <select class="form-control custom-select" name="hit" id="hit"> 
                <option value="0">Не хит</option> 
                <option value="1">Хит</option> 
        </select> 
        <select class="form-control custom-select" name="sale" id="sale"> 
                <option value="0">Не скидка</option> 
                <option value="1">Скидка</option> 
        </select>

        <div class="mb-3">
            <label for="img" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>

        <button type="submit" class="btn btn-primary">Создать пост</button>
    </form>
</div>

@endsection
