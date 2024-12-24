@extends('layouts.layout')

@section('content')

<div style="position: relative; top: 90px;" class="container create-container">
    <h1>Добавить данные</h1>

    <form action="{{ route('dates.store') }}" method="POST">
        @csrf
        <div class="mb-3 addDate">
            <label for="date" class="">Дата<i class="fa-solid fa-calendar-days" style="position: relative; left: 1px;"></i></label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="bt">
        <button type="submit" class="btnnav">Добавить дату<i class="fa-solid fa-pen-to-square" style="position: relative; left: 6px;"></i></button>
        </div>
    </form>

    <form action="{{ route('departures.store') }}" method="POST">
        @csrf
        <div class="mb-3 addDep">
            <label for="departure_name" class="">Название пункта отправления<i class="fa-solid fa-person-walking-arrow-right" style="position: relative; left: 3px;"></i></label>
            <input type="text" class="form-control" id="departure_name" name="name" required>
        </div>
        <label for="ship_id" class="">Корабль<i class="fa-solid fa-ship" style="position: relative; left: 3px;"></i></label>
        <select class="form-control" id="ship_id" name="ship_id" required> 
            @foreach ($availableShips as $ship) 
                    <option value="{{ $ship->id }}">{{ $ship->name }}</option> 
            @endforeach 
        </select>
        <div class="bt">
            <button type="submit" class="btnnav">Добавить отправление<i class="fa-solid fa-pen-to-square" style="position: relative; left: 6px;"></i></button>
        </div>
    </form>

    <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 addDest">
            <label for="destination_name" class="">Название пункта назначения<i class="fa-solid fa-location-dot" style="position: relative; left: 1px;"></i></label>
            <input type="text" class="form-control" id="destination_name" name="name" required>
        </div>
        <label for="ship_id" class="">Корабль<i class="fa-solid fa-ship" style="position: relative; left: 3px;"></i></label>
        <select class="form-control" id="ship_id" name="ship_id" required> 
            @foreach ($availableShips as $ship) 
                    <option value="{{ $ship->id }}">{{ $ship->name }}</option> 
            @endforeach 
        </select> 
        <label for="description" class="">Описание</label>
        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        <label for="img" class="">Изображение</label>
        <input type="file" class="form-control" id="img" name="img">
        <div class="bt">
        <button type="submit" class="btnnav">Добавить пункт назначения<i class="fa-solid fa-pen-to-square" style="position: relative; left: 6px;"></i></button>
        </div>
    </form>

    <form action="{{ route('ships.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 addShip">
            <label for="ship_name" class="">Название корабля</label>
            <input type="text" class="form-control" id="ship_name" name="name" required>
            <label for="description" class="">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                <label for="img" class="">Изображение</label>
                <input type="file" class="form-control" id="img" name="img">
        </div>
        <div class="bt">
        <button type="submit" class="btnnav">Добавить корабль<i class="fa-solid fa-pen-to-square" style="position: relative; left: 6px;"></i></button>
        </div>
    </form>
</div>
</div>

@endsection
