@extends('layouts.layout')

@section('content')
    <div class="results-container ">
        <div class="results">
            <h1>Результаты поиска круизов</h1>

            @if ($cruises->isEmpty())
                <p>Извините, нет доступных круизов по выбранным параметрам.</p>
            @else
                @foreach ($cruises as $cruise)
                    <div class="plan-card">
                        <img src="{{ $cruise->getImage() }}" alt="" class="plan-thumb card-img-top">
                        <div class="card-body">
                            <h5 class="card-title plan-title">{{ $cruise->title }}</h5>
                            <p class="card-text">{{ $cruise->description }}</p>
                            <ul class="list-group list-group-flush plan-list">
                                <li class="list-group-item plan-item">Отправка из: {{ $cruise->departure->name }}</li>
                                <li class="list-group-item plan-item">Пункт назначения: {{ $cruise->destination->name }}
                                </li>
                                <li class="list-group-item plan-item">Круизный лайнер: {{ $cruise->ship->name }}</li>
                                <li class="list-group-item plan-item">Ночей в круизе: {{ $cruise->nights }}</li>
                                <li class="list-group-item plan-item">Дата отбытия: {{ $cruise->date->date }}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
