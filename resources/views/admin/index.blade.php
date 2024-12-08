@extends('layouts.layout') 
 
@section('content') 
 
@if(Auth::check() && Auth::user()->is_admin == 1)
<div class="aproduct-cards" style="position: relative; top: 60px; margin-bottom: 20px">
@else
<div class="aproduct-cards">
@endif
        <h2>Доступные круизы</h2> 
        <div class="add-container d-flex justify-content-center">
            <a href="{{ route('admin.create') }}">
                <button class="btnnav add-button"><span>Создать круиз</span><img class="" src="{{ url('storage/GUI/ship-boat-svgrepo-com.svg') }}" alt=""></button>
            </a> 
            <a href="{{ route('admin.createData') }}">
                <button class="btnnav add-button"><span>Добавить данные</span><img class="" src="{{ url('storage/GUI/data-2-svgrepo-com.svg') }}" alt=""></button>
            </a> 
            <a href="{{ route('admin.editAll') }}">
                <button class="btnnav add-button"><span>Изменить данные</span><img class="" src="{{ url('storage/GUI/edit-3-svgrepo-com (1).svg') }}" alt=""></button>
            </a> 
        </div>
        <div class="atable"> 
            @foreach ($cruises as $cruise) 
                <form action="{{ route('admin.update', $cruise) }}" class="" method="POST" enctype="multipart/form-data"> 
                    @csrf 
                    <div class="card-hover">
                        <div class="aproduct-card"> 
                            <div class="acard-thumb"> 
                                <a href=""> 
                                    <h5 class="cruise-title">{{ $cruise->title }}</h5> 
                                    <img src="{{ $cruise->getImage() }}" alt="" class="acard-img"> 
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
                            <div class="acard-title collapse h-30" id="at{{ $cruise->id }}"> 
                                <input class="form-control" value="{{ $cruise->title }}" type="text" id="title" name="title" placeholder="Введите название" style="font-weight: 600">
                                <textarea type="text" value="{{ $cruise->description }}" class="form-control description" name="description" id="description" placeholder="Введите описание" rows="2">{{ $cruise->description }}</textarea>
                                <input class="form-control" value="{{ $cruise->status }}" type="text" id="status" name="status" placeholder="Введите статус">
                                <input class="form-control" value="{{ $cruise->nights }}" type="text" id="nights" name="nights" placeholder="Введите количесвто ночей">
    
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
                                <input value="{{ $cruise->sale }}" type="number" class="form-control" id="sale" name="sale" required min="0" max="100" placeholder="Введите скидку в %">
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
    
                                <input class="form-control" type="file" id="img" name="img"> 
    
                                <div class="acard-price" style="z-index: 1"> 
                                    <input class="form-control" value="{{ $cruise->price }}" type="text" id="price" name="price">
                                </div> 
                            </div> 
                        </div>

                </form> 

                <form action="{{ route('admin.destroy', $cruise->id) }}" method="POST" class="destroyForm"> 
                    @csrf 
                    <button class="btnnav trash" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button> 
                </form> 
            </div>
            @endforeach 
        </div> 
    </div> 


    <div class="col-md-12"> 
        <nav aria-label="Page navigation example" style="z-index: 1"> 
            {{ $cruises->links() }} 
        </nav> 
    </div> 
@endsection