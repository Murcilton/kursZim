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

<div class="container create-container">
    <h1>Создать новый пост</h1>

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Содержание</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>

        <label for="status" class="form-label">Статус</label>
        <input class="form-control" value="" type="text" id="status" name="status">
        <label for="status" class="form-label">Ночей</label>
        <input class="form-control" value="" type="text" id="nights" name="nights">

        
        <select class="form-control custom-select" name="hit" id="hit"> 
                <option value="0">Не хит</option> 
                <option value="1">Хит</option> 
        </select> 
        <select class="form-control custom-select" name="sale" id="sale"> 
                <option value="0">Не скидка</option> 
                <option value="1">Скидка</option> 
        </select>

        <div class="mb-3">
            <label for="img" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>

        <button type="submit" class="btn btn-primary">Создать пост</button>
    </form>
</div>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection
