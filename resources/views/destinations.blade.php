@extends('layouts.layout')

@section('content')
    <div class="cruises-container ">
        <div class="cruises">
            @if ($dests->isEmpty())
                <p>Извините, нет доступных пунктов назначения</p>
            @else
                @foreach ($dests as $ship)
                    <div class="plan-card plan-ships" style="min-width: 500px">
                        <img src="{{ $ship->getImage() }}" alt="" class="plan-thumb">
                        <div class="card-body">
                            <h5 class="card-title plan-title">{{ $ship->name }}</h5>
                            <p class="card-text">
                                {{ $ship->description }} <br>
                                {{ $ship->ship->name }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
