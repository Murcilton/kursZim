@extends('layouts.layout')

@section('content')
    <div class="cruises-container ">
        <div class="cruises">
            @if ($cruises->isEmpty())
                <p>Извините, нет доступных корбалей</p>
            @else
                @foreach ($ships as $ship)
                    <div class="plan-card plan-ships">
                        <img src="{{ $ship->getImage() }}" alt="" class="plan-thumb ">
                        <div class="card-body">
                            <h5 class="card-title plan-title">{{ $ship->name }}</h5>
                            <p class="card-text">{{ $ship->description }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
