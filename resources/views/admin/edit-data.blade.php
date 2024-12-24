@extends('layouts.layout')

@section('content')
<div class="container edit-data-container">
    <h1>Редактировать данные</h1>

    <ul class="nav nav-tabs" id="dataTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="dates-tab" data-bs-toggle="tab" href="#dates" role="tab" aria-controls="dates" aria-selected="true">Даты</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="departures-tab" data-bs-toggle="tab" href="#departures" role="tab" aria-controls="departures" aria-selected="false">Отправления</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="destinations-tab" data-bs-toggle="tab" href="#destinations" role="tab" aria-controls="destinations" aria-selected="false">Направления</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="ships-tab" data-bs-toggle="tab" href="#ships" role="tab" aria-controls="ships" aria-selected="false">Корабли</a>
        </li>
    </ul>

    <div class="tab-content mt-4" id="dataTabsContent">
        <!-- Даты -->
        <div class="tab-pane custom-fade fade show active" id="dates" role="tabpanel" aria-labelledby="dates-tab">
            <h3>Редактировать даты</h3>
            @foreach ($dates as $date)
            <div class="editCont editDate">
                <form action="{{ route('dates.update', $date->id) }}" method="POST" class="editForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="date" class="form-label">Дата {{ $date->id }}</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $date->date }}" required>
                    </div>
                    <button type="submit" class="btnnav ed">Обновить<i class="fa-solid fa-pen-to-square" style="position: relative; left: 6px;"></i></button>
                </form>
                <form action="{{ route('dates.delete', $date->id) }}" method="POST" class="d-inline editDelete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnnav" onclick="return confirm('Вы уверены, что хотите удалить эту дату?');"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
            @endforeach
        </div>

        <!-- Отправления -->
        <div class="tab-pane custom-fade fade" id="departures" role="tabpanel" aria-labelledby="departures-tab">
            <h3>Редактировать отправления</h3>
            @foreach ($departures as $departure)
            <div class="editCont editDep">
                <form action="{{ route('departures.update', $departure->id) }}" method="POST" class="editForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $departure->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="ship_id" class="form-label">Корабль</label>
                        <select class="form-control" id="ship_id" name="ship_id" required>
                            @foreach ($ships as $ship)
                            <option value="{{ $ship->id }}" {{ $departure->ship_id == $ship->id ? 'selected' : '' }}>{{ $ship->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btnnav ed">Обновить<i class="fa-solid fa-pen-to-square" style="position: relative; left: 6px;"></i></button>
                </form>
                <form action="{{ route('departures.delete', $departure->id) }}" method="POST" class="d-inline editDelete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnnav" onclick="return confirm('Вы уверены, что хотите удалить это отправление?');"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
            @endforeach
        </div>

        <!-- Направления -->
        <div class="tab-pane custom-fade fade" id="destinations" role="tabpanel" aria-labelledby="destinations-tab">
            <h3>Редактировать направления</h3>
            @foreach ($destinations as $destination)
            <div class="editCont editDest">
                <form action="{{ route('destinations.update', $destination->id) }}" method="POST" class="editForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $destination->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="ship_id" class="form-label">Корабль</label>
                        <select class="form-control" id="ship_id" name="ship_id" required>
                            @foreach ($ships as $ship)
                            <option value="{{ $ship->id }}" {{ $destination->ship_id == $ship->id ? 'selected' : '' }}>{{ $ship->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $destination->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Изображение</label>
                        <input type="file" class="form-control" id="img" name="img">
                        @if($ship->img)
                        <img src="{{ Storage::url($destination->img) }}" alt="Изображение" style="object-fit: cover; width: 100%; margin-top: 10px; border-radius: 20px;" loading="lazy">
                        @endif
                    </div>
                    <button type="submit" class="btnnav ed">Обновить<i class="fa-solid fa-pen-to-square" style="position: relative; left: 6px;"></i></button>
                </form>
                <form action="{{ route('destinations.delete', $destination->id) }}" method="POST" class="d-inline editDelete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnnav" onclick="return confirm('Вы уверены, что хотите удалить это направление?');"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
            @endforeach
        </div>

        <!-- Корабли -->
        <div class="tab-pane custom-fade fade" id="ships" role="tabpanel" aria-labelledby="ships-tab">
            <h3>Редактировать корабли</h3>
            @foreach ($ships as $ship)
            <div class="editCont editShips">
                <form action="{{ route('ships.update', $ship->id) }}" method="POST" enctype="multipart/form-data" class="editForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $ship->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $ship->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Изображение</label>
                        <input type="file" class="form-control" id="img" name="img">
                        @if($ship->img)
                        <img src="{{ Storage::url($ship->img) }}" alt="Изображение" style="object-fit: cover; width: 100%; margin-top: 10px; border-radius: 20px;" loading="lazy">
                        @endif
                    </div>
                    <button type="submit" class="btnnav ed">Обновить<i class="fa-solid fa-pen-to-square" style="position: relative; left: 6px;"></i></button>
                </form>
                <form action="{{ route('ships.delete', $ship->id) }}" method="POST" class="d-inline editDelete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnnav" onclick="return confirm('Вы уверены, что хотите удалить этот корабль?');"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
