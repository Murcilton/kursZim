@extends('layouts.layout')

{{-- @section('title')
    @parent :: {{ $title }}
@endsection --}}
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

    <div class="aproduct-cards mb-5">

        <div class="col-md-12e atable g-3">
            @foreach ($cruises as $cruise)
            <form action="{{ route('admin.update', $cruise) }}" class="aproduct-card" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="aproduct-card">

                    {{-- <div class="offer">
                        @if ($cruise->hit)
                            <div class="offer-hit">Hit</div>
                        @endif
                        @if ($cruise->sale)
                            <div class="offer-sale">Sale</div>
                        @endif
                    </div> --}}
                    <div class="acard-thumb">
                        <a href="">
                            <img src="{{ $cruise->getImage() }}" alt="">
                        </a>
                    </div>
                    <div class="acard-caption">

                        <button style="min-width: 140px" class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#at{{ $cruise->id }}" aria-expanded="true" aria-controls="acard-title">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            Настроить 
                        </button>

                        <div class="acard-title card collapse h-30" id="at{{ $cruise->id }}" style="max-width: 205px; padding: 8px; height: 400px">

                            <input class="form-control" style="" value="{{ $cruise->title }}" type="text" id="title" name="title" href=""></input>
                            <input type="text" value="{{ $cruise->description }}" style="" class="form-control content" name="content" id="content" placeholder="Контент"></input>
                            
                            {{-- <select style="" class="custom-select" name="category_id" id="category_id">

                                @if($product->category_id == 1)
                                <option value="1">Категория 1</option>
                                <option value="2">Категория 2</option>
                                @else
                                <option value="2">Категория 2</option>
                                <option value="1">Категория 1</option>
                                @endif
                            </select> --}}
                            {{-- <select style="" class="custom-select" name="status_id" id="status_id">
                                
                                @if($cruise->status->id == 1)
                                <option value="1">В наличии</option>
                                <option value="2">Ожидается</option>
                                @else
                                <option value="2">Ожидается</option>
                                <option value="1">В наличии</option>
                                @endif
                            </select> --}}
                            <select style="" class="custom-select" name="hit" id="hit">
                                @if($cruise->hit == 1)
                                <option value="1">Хит</option>
                                <option value="0">Не хит короче</option>
                                @else
                                <option value="0">Не хит короче</option>
                                <option value="1">Хит</option>
                                @endif
                            </select>
                            <select style="" class="custom-select" name="sale" id="sale">
                                @if($cruise->sale == 1)
                                <option value="1">Скидка</option>
                                <option value="0">Не скидка короче</option>
                                @else
                                <option value="0">Не скидка короче</option>
                                <option value="1">Скидка</option>
                                @endif
                            </select>

                                <label for="formFile" class="form-label"></label>
                                <input style="position: relative; z-index: 10; bottom: 5px" class="form-control" type="file" id="img" name="img">

                                <div class="acard-price" style="z-index: 1">
                                    <input class="form-control" style="position:relative; top: 17px" value="{{ $cruise->price }}" type="text" id="price" name="price"></input>
                                </div>
                            </div>

                        <div class="aitem-status editableStatus">{{ $cruise->status }}</div>
                        <button type="submit" id="editButton" class="btn btn-success settings" style=" "><i class="fa fa-check" aria-hidden="true"></i></button>
                    </form>
                    <form action="{{ route('admin.destroy', $cruise->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger trash" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                    </div>
                </div>
            
            @endforeach
        </div>

    </div><!-- /product-cards -->

    <a href="{{ route('admin.create') }}" style="width: 1000px; margin: 10px; position: relative; bottom: 15px"><button class="btn btn-primary add" style="z-index: 100; width: 100%">Добавить запись</button></a>

    <div class="col-md-12">
        <nav aria-label="Page navigation example" style="z-index: 1">
            {{ $cruises->links() }}
        </nav>
    </div>

@endsection
