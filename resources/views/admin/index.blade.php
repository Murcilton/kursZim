@extends('layouts.layout') 
 
@section('content') 
    @if ($errors->any()) 
        <div class="alert alert-danger"> 
            <ul> 
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
    @endif 
 
    <div class="aproduct-cards"> 
        <h2>Доступные круизы</h2> 
        <div class="atable g-3"> 
            @foreach ($cruises as $cruise) 
                <form action="{{ route('admin.update', $cruise) }}" class="aproduct-card" method="POST" enctype="multipart/form-data"> 
                    @csrf 
                    <div class="aproduct-card"> 
                        <div class="acard-thumb"> 
                            <a href=""> 
                                <h5 class="cruise-title">{{ $cruise->title }}</h5> 
                                <img src="{{ $cruise->getImage() }}" alt=""> 
                            </a> 
                        </div> 
 
                        <div class="acard-caption"> 
                            <button id="settingsButton" class="btnnav" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#at{{ $cruise->id }}" aria-expanded="true" aria-controls="acard-title"> 
                                <i class="fa fa-cog" aria-hidden="true"></i> 
                            </button> 
                            <button type="submit" id="editButton" class="btnnav">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </button> 
                        </div> 
                        <div class="acard-title card collapse h-30" id="at{{ $cruise->id }}"> 
                            <input class="form-control" value="{{ $cruise->title }}" type="text" id="title" name="title">
                            <input type="text" value="{{ $cruise->description }}" class="form-control description" name="description" id="description" placeholder="Контент">
                            <input class="form-control" value="{{ $cruise->status }}" type="text" id="status" name="status">
                            <input class="form-control" value="{{ $cruise->nights }}" type="text" id="nights" name="nights">

                            <select class="form-control" id="date_id" name="date_id" required> 
                                <option value="{{ $cruise->date_id }}">{{ $cruise->date->date }}</option> 
                                @foreach ($availableDates as $date) 
                                    @if ($date->id !== $cruise->date_id) 
                                        <option value="{{ $date->id }}">{{ $date->date }}</option> 
                                    @endif 
                                @endforeach 
                            </select> 
                            <select class="form-control" id="ship_id" name="ship_id" required> 
                                <option value="{{ $cruise->ship_id }}">{{ $cruise->ship->name }}</option> 
                                @foreach ($availableShips as $ship) 
                                    @if ($ship->id !== $cruise->ship_id) 
                                        <option value="{{ $ship->id }}">{{ $ship->name }}</option> 
                                    @endif 
                                @endforeach 
                            </select> 
                            <select class="form-control" id="destination_id" name="destination_id" required> 
                                <option value="{{ $cruise->destination_id }}">{{ $cruise->destination->name }}</option> 
                                @foreach ($availableDest as $dest) 
                                    @if ($dest->id !== $cruise->destination_id)
                                    <option value="{{ $dest->id }}">{{ $dest->name }}</option> 
                                    @endif 
                                @endforeach 
                            </select> 
                            <select class="form-control" id="departure_id" name="departure_id" required> 
                                <option value="{{ $cruise->departure_id }}">{{ $cruise->departure->name }}</option> 
                                @foreach ($availableDep as $dep) 
                                    @if ($dep->id !== $cruise->departure_id) 
                                        <option value="{{ $dep->id }}">{{ $dep->name }}</option> 
                                    @endif 
                                @endforeach 
                            </select> 

                            <select class="form-control custom-select" name="hit" id="hit"> 
                                @if ($cruise->hit == 1) 
                                    <option value="1">Хит</option> 
                                    <option value="0">Не хит</option> 
                                @else 
                                    <option value="0">Не хит</option> 
                                    <option value="1">Хит</option> 
                                @endif 
                            </select> 
                            <select class="form-control custom-select" name="sale" id="sale"> 
                                @if ($cruise->sale == 1) 
                                    <option value="1">Скидка</option> 
                                    <option value="0">Не скидка</option> 
                                @else 
                                    <option value="0">Не скидка</option> 
                                    <option value="1">Скидка</option> 
                                @endif 
                            </select> 

                            <input class="form-control" type="file" id="img" name="img"> 

                            <div class="acard-price" style="z-index: 1"> 
                                <input class="form-control" value="{{ $cruise->price }}" type="text" id="price" name="price">
                            </div> 
                        </div> 
                    </div>
                </form> 

                <form action="{{ route('admin.destroy', $cruise->id) }}" method="POST"> 
                    @csrf 
                    <button class="btnnav trash" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button> 
                </form> 
            @endforeach 
        </div> 
    </div> 

    <a href="{{ route('admin.create') }}">
        <button class="btnnav add-button">Добавить запись</button>
    </a> 

    <div class="col-md-12"> 
        <nav aria-label="Page navigation example" style="z-index: 1"> 
            {{ $cruises->links() }} 
        </nav> 
    </div> 
@endsection