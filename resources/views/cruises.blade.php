@extends('layouts.layout')

@section('content')
    <div class="cruises-container ">
        <div class="booking-container">
            <img class="bbackground" src="{{ url('storage/GUI/Booking Background.svg') }}" alt="" title="" loading="lazy"/>
            <form action="{{ route('cruise.search') }}" method="GET" class="modals">
                @csrf
                {{-- Первое окно --}}
                <div class="first-modal">
                    <label for="b1" class="btnmodalLabel">Круиз в</label>
                    <button type="button" id="modalButton" class="btnmodal b1" data-bs-toggle="modal"
                        data-bs-target="#destinationModal">
                        Куда <span>угодно</span>
                        <img class="btnmodalArrow" src="{{ url('storage/GUI/Arrow Down.svg') }}" alt="" loading="lazy"/>
                    </button>
                    <div class="modal fade" id="destinationModal" tabindex="-1" aria-labelledby="destinationModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal2-dialog modal-dialog-centered">
                            <div class="modal-content modal2-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="destinationModalLabel">Выберите направление</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body modal2-body">
                                    <button type="button" class="btnmodal destination-option" data-id="">
                                        Куда угодно
                                    </button>
                                    @foreach ($availableDest as $destination)
                                        <button type="button" class="btnmodal destination-option"
                                            data-id="{{ $destination->id }}">
                                            {{ $destination->name }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="destination_id" id="destinationInput">

                {{-- Второе окно --}}
                <div class="second-modal">
                    <label for="b2" class="btnmodalLabel">Отправка из</label>
                    <button type="button" id="modalButton2" class="btnmodal b2" data-bs-toggle="modal"
                        data-bs-target="#departureModal">
                        Откуда <span>угодно</span>
                        <img class="btnmodalArrow" src="{{ url('storage/GUI/Arrow Down.svg') }}" alt="" loading="lazy"/>
                    </button>
                    <div class="modal fade" id="departureModal" tabindex="-1" aria-labelledby="departureModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal2-dialog modal-dialog-centered">
                            <div class="modal-content modal2-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="departureModalLabel">Выберите отправление</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body modal2-body">
                                    <button type="button" class="btnmodal departure-option" data-id="">
                                        Откуда угодно
                                    </button>
                                    @foreach ($availableDep as $departure)
                                        <button type="button" class="btnmodal departure-option"
                                            data-id="{{ $departure->id }}">
                                            {{ $departure->name }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="departure_id" id="departureInput">

                {{-- Третье окно --}}
                <div class="third-modal">
                    <label for="b3" class="btnmodalLabel">Отправка в</label>
                    <button type="button" id="modalButton3" class="btnmodal b3" data-bs-toggle="modal"
                        data-bs-target="#dateModal">
                        <span>В любое</span> Время
                        <img class="btnmodalArrow" src="{{ url('storage/GUI/Arrow Down.svg') }}" alt="" loading="lazy"/>
                    </button>
                    <div class="modal fade" id="dateModal" tabindex="-1" aria-labelledby="dateModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal2-dialog modal-dialog-centered">
                            <div class="modal-content modal2-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="dateModalLabel">Выберите дату</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body modal2-body">
                                    <button type="button" class="btnmodal date-option" data-id="">
                                        В любое время
                                    </button>
                                    @foreach ($availableDates as $date)
                                        <button type="button" class="btnmodal date-option"
                                            data-id="{{ $date->id }}">
                                            {{ $date->date }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="date_id" id="dateInput">

                <button type="submit" class="btnmodal btnsubmit"><span>Найти круиз</span><i class="fa-solid fa-check"
                        style="color: #ffffff;"></i></button>
            </form>
        </div>
        <div class="cruises">
            @if ($cruises->isEmpty())
                <p>Извините, нет доступных круизов по выбранным параметрам.</p>
            @else
                @foreach ($cruises as $cruise)
                    <div
                        class="plan-card @if ($cruise->hit == 1) hit @endif @if ($cruise->sale !== 0) sale @endif">
                        <a href="{{ route('show', ['slug' => $cruise->slug]) }}"
                            style="text-decoration: none; color:#012840"><img src="{{ $cruise->getImage() }}"
                                alt="" class="plan-thumb "></a>
                        <div class="plan-price">
                            <span>
                                @if ($cruise->sale == 0)
                                    {{ $cruise->price }}$
                                @else
                                    <span
                                        style="font-size: 15px;text-decoration: line-through; text-decoration-thickness: 1px; text-decoration-color: yellow;">
                                        {{ $cruise->price }}$</span>
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
                                <span>
                                    ХИТ
                                </span>
                            </div>
                            <div class="plan-fade">
                                &#8203
                            </div>
                        @endif


                        <div class="card-body">
                            <h5 class="card-title plan-title">
                                <a class="a-title" href="{{ route('show', ['slug' => $cruise->slug]) }}" style="text-decoration: none; color:#012840">
                                    {{ $cruise->title }}
                                    @if(Auth::user() && $user->cruise_order_id == $cruise->id)
                                    <i class="fa-solid fa-star" style="color: #FFD43B; position: absolute; z-index: -1; left: -5px; bottom: 120px"></i>
                                    @endif
                                </a>
                                </h5>
                            <p class="card-text">{{ $cruise->description }}</p>
                            <ul class="list-group list-group-flush plan-list">
                                <li class="list-group-item plan-item">Отправка из: {{ $cruise->departure->name }}<i
                                        class="fa-solid fa-person-walking-arrow-right"
                                        style="position: relative; left: 7px;"></i></li>
                                <li class="list-group-item plan-item">Пункт назначения: {{ $cruise->destination->name }}<i
                                        class="fa-solid fa-location-dot"></i></li>
                                <li class="list-group-item plan-item">Круизный лайнер: {{ $cruise->ship->name }}<i
                                        class="fa-solid fa-ship" style="position: relative; left: 3px;"></i></li>
                                <li class="list-group-item plan-item">Ночей в круизе: {{ $cruise->nights }}<i
                                        class="fa-solid fa-moon" style="color: #ffffff;"></i></li>
                                <li class="list-group-item plan-item">Дата отбытия: {{ $cruise->date->date }}<i
                                        class="fa-solid fa-calendar-days" style="position: relative; left: 1px;"></i></li>
                            </ul>
                            <button class="add-to-cart-btn add-to-cart-btn2" data-id="{{ $cruise->id }}"
                                data-url="{{ route('cart.add') }}" data-token="{{ csrf_token() }}">
                                <i class="fa-solid fa-cart-shopping fa-sm" style="margin-left: 3px">+</i>
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
