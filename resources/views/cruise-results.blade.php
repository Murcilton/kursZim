@extends('layouts.layout')

@section('content')
    <div class="cruises-container ">
        <h1>Результаты поиска круизов</h1>
        <div class="search-tags">
            @if(isset($dest))
            <i class="fas fa-chevron-right fa-sm" style="margin-right: 10px"></i><span>{{ $dest }}</span>
            @endif
            @if(isset($dep))
            <i class="fas fa-chevron-right fa-sm" style="margin-right: 10px"></i><span>{{ $dep }}</span>
            @endif
            @if(isset($date))
            <i class="fas fa-chevron-right fa-sm" style="margin-right: 10px"></i><span>{{ $date }}</span>
            @endif
        </div>

        <div class="cruises">
            @if ($cruises->isEmpty())
                <p>Извините, нет доступных круизов по выбранным параметрам.</p>
            @else
                @foreach ($cruises as $cruise)
                    <div class="plan-card">
                        <img src="{{ $cruise->getImage() }}" alt="" class="plan-thumb " loading="lazy">
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
