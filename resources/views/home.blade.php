@extends('layouts.layout')

@section('content')
    <div class="owl-carousel owl-carousel1 owl-theme owl1">
        <div class="item item3">
            <img src="{{ url('storage/img/Union.png') }}" alt="">
        </div>
        <div class="item item1">
            <img src="{{ url('storage/img/6d.jpeg') }}" alt="">
        </div>
        <div class="item item2">
            <img src="{{ url('storage/img/Wonder of the Seas_1645411198_WN22-DroneCadiz218R.webp') }}" alt="">
        </div>

    </div>

    <div class="cards-container">
        <div class="cards">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col mb-4">
                    <div class="card card-item">
                        <img class="card-img" src="{{ url('storage/img/Screenshot 2024-11-26 174422.png') }}"
                            alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Европа</h5>
                            <p class="card-text"></p>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card card-item">
                        <img class="card-img" src="{{ url('storage/img/Famous-Landmarks-In-Alaska-cover.jpg') }}"
                            alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Аляска</h5>
                            <p class="card-text"></p>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card card-item">
                        <img class="card-img"
                            src="{{ url('storage/img/jw-marriott_plant-riverside-savannah-c-credit-jw-marriott-plant-riverside-savannah.jpg') }}"
                            alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Грузия</h5>
                            <p class="card-text"></p>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-4">
                <div class="col-12 mb-4">
                    <div class="card card4">
                        <img class="card-img"
                            src="{{ url('storage/img/aerial-top-view-beautiful-white-cruise-running-with-contrail-ocean-sea-luxury-cruise-ocean-sea-concept-tourism-relax-travel-holiday-vacation-time_33850-636.jpg') }}"
                            alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Предложения сезона</h5>
                            <p class="card-text"></p>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="booking-container">
        <img class="bbackground" src="{{ url('storage/GUI/Booking Background.svg') }}" alt="" title="" />
        <form action="{{ route('cruise.search') }}" method="GET" class="modals">
            @csrf
            {{-- Первое окно --}}
            <div class="first-modal">
                <label for="b1" class="btnmodalLabel">Круиз в</label>
                <button type="button" id="modalButton" class="btnmodal b1" data-bs-toggle="modal" data-bs-target="#destinationModal">
                    Куда <span>угодно</span>
                    <img class="btnmodalArrow" src="{{ url('storage/GUI/Arrow Down.svg') }}" alt="" />
                </button>
                <div class="modal fade" id="destinationModal" tabindex="-1" aria-labelledby="destinationModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal2-dialog modal-dialog-centered">
                        <div class="modal-content modal2-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="destinationModalLabel">Выберите направление</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body modal2-body">
                                <button type="button" class="btnmodal destination-option" data-id="">
                                    Куда угодно
                                </button>
                                @foreach($destinations as $destination)
                                    <button type="button" class="btnmodal destination-option" data-id="{{ $destination->id }}">
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
                <button type="button" id="modalButton2" class="btnmodal b2" data-bs-toggle="modal" data-bs-target="#departureModal">
                    Откуда <span>угодно</span>
                    <img class="btnmodalArrow" src="{{ url('storage/GUI/Arrow Down.svg') }}" alt="" />
                </button>
                <div class="modal fade" id="departureModal" tabindex="-1" aria-labelledby="departureModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal2-dialog modal-dialog-centered">
                        <div class="modal-content modal2-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="departureModalLabel">Выберите отправление</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body modal2-body">
                                <button type="button" class="btnmodal departure-option" data-id="">
                                    Откуда угодно
                                </button>
                                @foreach($departures as $departure)
                                    <button type="button" class="btnmodal departure-option" data-id="{{ $departure->id }}">
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
                <button type="button" id="modalButton3" class="btnmodal b3" data-bs-toggle="modal" data-bs-target="#dateModal">
                    <span>В любое</span> Время
                    <img class="btnmodalArrow" src="{{ url('storage/GUI/Arrow Down.svg') }}" alt="" />
                </button>
                <div class="modal fade" id="dateModal" tabindex="-1" aria-labelledby="dateModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal2-dialog modal-dialog-centered">
                        <div class="modal-content modal2-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="dateModalLabel">Выберите дату</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body modal2-body">
                                <button type="button" class="btnmodal date-option" data-id="">
                                    В любое время
                                </button>
                                @foreach($dates as $date)
                                    <button type="button" class="btnmodal date-option" data-id="{{ $date->id }}">
                                            {{ $date->date }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="date_id" id="dateInput">
    
            <button type="submit" class="btnmodal btnsubmit"><span>Найти круиз</span><i class="fa-solid fa-check" style="color: #ffffff;"></i></button>
        </form>
    </div>
    

    <div class="ships-container">
        <img class="sbackground" src="{{ url('storage/GUI/Ships Background.svg') }}" alt="" title=""
            style="" />
        <div class="row ships-row">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="ships">
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="card-title"><br>Единственные. <br>Cовременные. <br>Cовершенные.</h5>
                            <p class="card-text">Прикоснитесь к вершине инженерной мысли в области коммерческого
                                судостроения и станьте одними из немногих кто почувствует величественную природу этих машин.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <div class="owl-carousel owl-carousel2 owl-theme">
                    <div class="item item1">
                        <img src="{{ url('storage/img/image.png') }}" alt="">
                    </div>
                    <div class="item item2">
                        <img src="{{ url('storage/img/RCI-Icon-of-the-Seas-Exterior-Ship-view-1200x700.jpg') }}"
                            alt="">
                    </div>
                    <div class="item item3">
                        <img src="{{ url('storage/img/image3.png') }}" alt="">
                    </div>
                    <div class="item item4">
                        <img src="{{ url('storage/img/a83622c50647cfdd40b092c3aeb23992.jpg') }}" alt="">
                    </div>
                    <div class="item item5">
                        <img src="{{ url('storage/img/low_1701726981_RCI-ST-Aerial-Aft-Night-CGI01-RT-crop-LR.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="gallery-container">
        <div class="divide">
            <h1>Взгляните на мир с его лучшей стороны</h1>
            <img class="divideSVG" src="{{ url('storage/GUI/Divide.svg') }}" alt="">
        </div>

        <img class="gbackground" src="{{ url('storage/GUI/Gallery Background.svg') }}" alt="">
        <div class="gallery-grid">
            <div id="item-0" class="gallery-item"
                style="background-image: url('{{ url('storage/img/Italy.png') }}');">
                <p>Италия</p>
            </div>
            <div id="item-1" class="gallery-item"
                style="background-image: url('{{ url('storage/img/Georgia.png') }}');">
                <p>Грузия</p>
            </div>
            <div id="item-2" class="gallery-item"
                style="background-image: url('{{ url('storage/img/Greece.png') }}');">
                <p>Греция</p>
            </div>
            <div id="item-3" class="gallery-item"
                style="background-image: url('{{ url('storage/img/Bahamas.png') }}');">
                <p>Багамы</p>
            </div>
            <div id="item-4" class="gallery-item"
                style="background-image: url('{{ url('storage/img/Caribs.png') }}');">
                <p>Карибы</p>
            </div>
        </div>
    </div>
@endsection
