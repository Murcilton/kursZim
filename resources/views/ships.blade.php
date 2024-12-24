@extends('layouts.layout')

@section('content')
    <div class="cruises-container ">
        <h1 style="position: relative; top: 60px">Доступные лайнеры</h1>
        <div class="cruises">
            @if ($cruises->isEmpty())
                <p>Извините, нет доступных корбалей</p>
            @else
            @foreach ($ships as $ship)
            <div class="ship-container">
            <div class="card plan-ship-card mb-3">
                <div class="row g-0">
                  <div class="col plan-ship-thumb">
                    <div class="blob">
                        <img class="" src="{{ url('storage/GUI/Blob.svg') }}" alt="" title="" style="" loading="lazy"/>
                    </div>
                    <img src="{{ $ship->getImage() }}" class="img-fluid rounded-start plan-thumb" alt="..." loading="lazy">
                  </div>
                  
                  <div class="col">
                    <div class="card-body">
                      <h5 class="card-title">{{ $ship->name }}</h5>
                      <p class="card-text">{{ $ship->description }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              @endforeach
                {{-- @foreach ($ships as $ship)
                    <div class="plan-card plan-ships">
                        <img src="{{ $ship->getImage() }}" alt="" class="plan-thumb ">
                        <div class="card-body">
                            <h5 class="card-title plan-title">{{ $ship->name }}</h5>
                            <p class="card-text">{{ $ship->description }}</p>
                        </div>
                    </div>
                @endforeach --}}
            @endif
        </div>
    </div>
   

@endsection
