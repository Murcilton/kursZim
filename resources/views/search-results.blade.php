@extends('layouts.layout')

@section('content')
<h1 class="text-center" style="position: relative; top: 90px">Результаты поиска для: "{{ $query }}"</h1>
    <div class="search-container">

        <div class="search-results">
            @if ($ships->isEmpty() && $cruises->isEmpty())
                <p style="height: 100vh">Извините, ничего не найдено.</p>
            @else
                @if (!$cruises->isEmpty())
                    @foreach ($cruises as $cruise)
                        <div class="plan-card plan-card-search @if ($cruise->hit == 1) hit @endif @if ($cruise->sale !== 0) sale @endif">
                            <a href="{{ route('show', ['slug' => $cruise->slug]) }}" style="text-decoration: none; color:#012840">
                                <img src="{{ $cruise->getImage() }}" alt="" class="plan-thumb" loading="lazy">
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
