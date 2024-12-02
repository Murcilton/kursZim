@extends('admin.layout')

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

<div class="container">
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
            <label for="content" class="form-label">Содержание</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="sale" class="form-label">Распродажа</label>
            <select style="" class="custom-select" name="sale" id="sale">
                <option value="0">Нет</option>
                <option value="1">Да</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="hit" class="form-label">Хит продаж</label>
            <select class="custom-select" id="hit" name="hit">
                <option value="0">Нет</option>
                <option value="1">Да</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select class="custom-select" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status_id" class="form-label">Статус</label>
            <select class="custom-select" id="status_id" name="status_id" required>
                <option value="">Выберите статус</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->title }}</option>
                @endforeach
            </select>
        </div>

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
