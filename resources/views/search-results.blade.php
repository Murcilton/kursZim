@extends('layouts.layout')

@section('content')
    <div class="search-container">
        <h1 style="position: relative; top: 60px">Результаты поиска для: "{{ $query }}"</h1>
        <div class="search-results">
            @if ($ships->isEmpty() && $cruises->isEmpty())
                <p>Извините, ничего не найдено.</p>
            @else
                @if (!$ships->isEmpty())
                    @foreach ($ships as $ship)
                        <div class="ship-container">
                            <div class="card plan-ship-card mb-3">
                                <div class="row g-0">
                                    <div class="col plan-ship-thumb">
                                        <div class="blob">
                                            <img src="{{ url('storage/GUI/Blob.svg') }}" alt="" title="" />
                                        </div>
                                        <img src="{{ $ship->getImage() }}" class="img-fluid rounded-start plan-thumb" alt="...">
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
                @endif

                @if (!$cruises->isEmpty())
                    @foreach ($cruises as $cruise)
                        <div class="plan-card @if ($cruise->hit == 1) hit @endif @if ($cruise->sale !== 0) sale @endif">
                            <a href="{{ route('show', ['slug' => $cruise->slug]) }}" style="text-decoration: none; color:#012840">
                                <img src="{{ $cruise->getImage() }}" alt="" class="plan-thumb">
                            </a>
                            <div class="plan-price">
                                <span>
                                    @if ($cruise->sale == 0)
                                        {{ $cruise->price }}$
                                    @else
                                        <span style="font-size: 15px; text-decoration: line-through;">
                                            {{ $cruise->price }}$
                                        </span>
                                        {{ $cruise->price - ($cruise->price / 100) * $cruise->sale }}$
                                    @endif
                                </span>
                            </div>
                            @if ($cruise->sale !== 0)
                                <div class="plan-sale">
                                    <span>{{ $cruise->sale }}%</span>
                                </div>
                            @endif
                            @if ($cruise->hit == 1)
                                <div class="plan-hit">
                                    <span>ХИТ</span>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title plan-title">
                                    <a class="a-title" href="{{ route('show', ['slug' => $cruise->slug]) }}" style="text-decoration: none; color:#012840">{{ $cruise->title }}</a>
                                </h5>
                                <p class="card-text">{{ $cruise->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
@endsection
