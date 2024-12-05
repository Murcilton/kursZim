@extends('layouts.layout')

@section('content')

<div class="container create-container">
    <h1>Создать данные</h1>

    <form action="{{ route('dates.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Дата</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить дату</button>
    </form>

    <form action="{{ route('departures.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="departure_name" class="form-label">Название пункта отправления</label>
            <input type="text" class="form-control" id="departure_name" name="name" required>
        </div>
        <select class="form-control" id="ship_id" name="ship_id" required> 
            @foreach ($availableShips as $ship) 
                    <option value="{{ $ship->id }}">{{ $ship->name }}</option> 
            @endforeach 
        </select> 
        <button type="submit" class="btn btn-primary">Добавить отправление</button>
    </form>

    <form action="{{ route('destinations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="destination_name" class="form-label">Название пункта назначения</label>
            <input type="text" class="form-control" id="destination_name" name="name" required>
        </div>
        <select class="form-control" id="ship_id" name="ship_id" required> 
            @foreach ($availableShips as $ship) 
                    <option value="{{ $ship->id }}">{{ $ship->name }}</option> 
            @endforeach 
        </select> 
        <button type="submit" class="btn btn-primary">Добавить пункт назначения</button>
    </form>

    <form action="{{ route('ships.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="ship_name" class="form-label">Название корабля</label>
            <input type="text" class="form-control" id="ship_name" name="name" required>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                <label for="img" class="form-label">Изображение</label>
                <input type="file" class="form-control" id="img" name="img">
        </div>
        <button type="submit" class="btn btn-primary">Добавить корабль</button>
    </form>
</div>
</div>

@endsection
