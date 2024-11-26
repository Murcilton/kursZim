@extends('layouts.layout')

@section('content')
    <div class="owl-carousel owl-carousel1 owl-theme owl1">
        <div class="item item1">
            <img src="{{ url('storage/img/6d.jpeg') }}" alt="">
        </div>
        <div class="item item2">
            <img src="{{ url('storage/img/royal-caribbean-wonder-of-the-seas.jpeg') }}" alt="">
        </div>
        <div class="item item3">
            <img src="{{ url('storage/img/Union.png') }}" alt="">
        </div>
    </div>

    <div class="cards-container">
        <div class="cards">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col mb-4">
                    <div class="card">
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
                    <div class="card">
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
                    <div class="card">
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
                        <img src="{{ url('storage/img/6d.jpeg') }}" alt="">
                    </div>
                    <div class="item item2">
                        <img src="{{ url('storage/img/royal-caribbean-wonder-of-the-seas.jpeg') }}" alt="">
                    </div>
                    <div class="item item3">
                        <img src="{{ url('storage/img/Union.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
