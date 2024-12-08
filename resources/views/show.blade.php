@extends('layouts.layout')


@section('content')
<div class="cruises">
    <div class="plan-card-show">
        <div class="plan-thumb-container-show">
        <img src="{{ $show->getImage() }}" alt="" class="plan-thumb-show">
        
    </div>
        <div class="card-body-show">
            <div class="content-show" style="position: relative;">
                <h5 class="card-title plan-title-show">{{ $show->title }}</h5>
                <p class="card-text-show" style="text-indent: 10px;">{{ $show->description }}</p>
            </div>
                <ul class="list-group list-group-flush plan-list-show">
                    <li class="list-group-item plan-item-show">Отправка из: <span>{{ $show->departure->name }}</span><i
                            class="fa-solid fa-person-walking-arrow-right" style="position: relative; left: 7px;"></i></li>
                    <li class="list-group-item plan-item-show">Пункт назначения: <span>{{ $show->destination->name }}</span><i
                            class="fa-solid fa-location-dot"></i></li>
                    <li class="list-group-item plan-item-show">Круизный лайнер: <span>{{ $show->ship->name }}</span><i
                            class="fa-solid fa-ship" style="position: relative; left: 3px;"></i></li>
                    <li class="list-group-item plan-item-show">Ночей в круизе: <span>{{ $show->nights }}</span><i class="fa-solid fa-moon"
                            "></i></li>
                    <li class="list-group-item plan-item-show">Дата отбытия: <span>{{ $show->date->date }}</span><i
                            class="fa-solid fa-calendar-days" style="position: relative; left: 1px;"></i></li>
                </ul>
                <div class="data-show">
                    <div class="plan-price-show">
                        <span>
                            @if ($show->sale == 0)
                            {{ $show->price }}$
                            @else
                            <span style="font-size: 15px;text-decoration: line-through; text-decoration-thickness: 1px; text-decoration-color: yellow;">
                                {{ $show->price }}$</span> {{ $show->price - $show->price / 100 * $show->sale}}$
                            @endif
                        </span>
                    </div>
                    @if ($show->sale !== 0)
                    <div class="plan-sale-show">
                        <span>{{ $show->sale }}%</span>
                    </div>
                    @endif
                    @if ($show->hit == 1)
                        <div class="plan-hit-show">
                            <span>
                                ХИТ
                            </span>
                        </div>
                    @endif
                    <a href="#">
                        <button 
                            class="btnnav add-to-cart-btn" 
                            data-id="{{ $show->id }}" 
                            data-url="{{ route('cart.add') }}" 
                            data-token="{{ csrf_token() }}">
                            <span>Добавить</span> 
                            <span>в корзину</span>
                            <i class="fa-solid fa-cart-shopping" style="margin-left: 3px">+</i>
                        </button>
                    </a>
                </div>
        </div>
    </div>
</div>
@endsection