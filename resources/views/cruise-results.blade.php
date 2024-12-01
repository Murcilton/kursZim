@extends('layouts.layout')

@section('content')
<div class="results-container">
    <div class="results">
        <h1>Результаты поиска круизов</h1>

        @if($cruises->isEmpty())
            <p>Извините, нет доступных круизов по выбранным параметрам.</p>
        @else
            <table class="table table-results">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Направление</th>
                        <th>Дата</th>
                        <th>Корабль</th>
                        <th>Длительность</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cruises as $cruise)
                        <tr>
                            <td>{{ $cruise->title }}</td>
                            <td>{{ $cruise->description }}</td>
                            <td>{{ $cruise->destination->name }}</td> 
                            <td>{{ $cruise->date->date }}</td> 
                            <td>{{ $cruise->ship->name }}</td> 
                            <td>{{ $cruise->nights }} ночей</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
