@extends('layouts.layout')

@section('content')
    <div class="owl-carousel owl-carousel1 owl-theme owl1">
        <div class="item item1">
            <img src="{{ url('storage/img/6d.jpeg') }}" alt="">
        </div>
        <div class="item item2">
            <img src="{{ url('storage/img/Wonder of the Seas_1645411198_WN22-DroneCadiz218R.webp') }}" alt="">
        </div>
        <div class="item item3">
            <img src="{{ url('storage/img/Union.png') }}" alt="">
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
                                судостроения и станьте одними из немногих кто почувствует величественную природу этих машин.</p>
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
                        <img src="{{ url('storage/img/RCI-Icon-of-the-Seas-Exterior-Ship-view-1200x700.jpg') }}" alt="">
                    </div>
                    <div class="item item3">
                        <img src="{{ url('storage/img/image3.png') }}" alt="">
                    </div>
                    <div class="item item4">
                        <img src="{{ url('storage/img/a83622c50647cfdd40b092c3aeb23992.jpg') }}" alt="">
                    </div>
                    <div class="item item5">
                        <img src="{{ url('storage/img/low_1701726981_RCI-ST-Aerial-Aft-Night-CGI01-RT-crop-LR.jpg') }}" alt="">
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
            <div id="item-0" class="gallery-item" style="background-image: url('{{ url('storage/img/Italy.png') }}');">
                <p>Италия</p>
            </div>
            <div id="item-1" class="gallery-item" style="background-image: url('{{ url('storage/img/Georgia.png') }}');">
                <p>Грузия</p>
            </div>
            <div id="item-2" class="gallery-item" style="background-image: url('{{ url('storage/img/Greece.png') }}');">
                <p>Греция</p>
            </div>
            <div id="item-3" class="gallery-item" style="background-image: url('{{ url('storage/img/Bahamas.png') }}');">
                <p>Багамы</p>
            </div>
            <div id="item-4" class="gallery-item" style="background-image: url('{{ url('storage/img/Caribs.png') }}');">
                <p>Карибы</p>
            </div>
        </div>
    </div>
    
@endsection
