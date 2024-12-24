@extends('layouts.layout')

@section('content')
<div class="about-us-container container mt-5">
    <style>
        body {
            
            color: #012840;
        }
        .team-member {
            margin-bottom: 30px;
        }
        .team-member img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
    </style>
    <h1 class="text-center mb-4">О нас</h1>
    <p class="lead text-center mb-5">Мы - команда профессионалов, готовых помочь вам выбрать идеальный круиз, который оставит незабываемые впечатления.</p>

    <h2 class="mb-4 text-center">Наша миссия</h2>
    <p class="text-center">Наша цель - обеспечить вам лучший опыт бронирования круизов, предоставляя актуальную информацию, лучшие предложения и непревзойденный сервис. Мы стремимся сделать ваши путешествия незабываемыми.</p>

    <h2 class="mt-5 mb-4 text-center">Наша команда</h2>
    <div class="row">
        <div class="col-md-4 team-member text-center">
            <img src="{{ url('storage/img/images.jpeg') }}" alt="Член команды 1" loading="lazy">
            <h5>Сергей Симонов</h5>
            <p>Генеральный директор</p>
            <p>Серёжа имеет более 10 лет опыта в индустрии круизов и страстно любит путешествовать.</p>
        </div>
        <div class="col-md-4 team-member text-center">
            <img src="{{ url('storage/img/yavlinsky_faces.jpg.webp') }}" alt="Член команды 2" loading="lazy">
            <h5>Григорий Явлинский</h5>
            <p>Менеджер по продажам</p>
            <p>Гришок поможет вам найти идеальный круиз, соответствующий вашим пожеланиям и бюджету.</p>
        </div>
        <div class="col-md-4 team-member text-center">
            <img src="{{ url('storage/img/16244811421430s.jpg') }}" alt="Член команды 3" loading="lazy">
            <h5>Владислав Савельев</h5>
            <p>Специалист по SEO оптимизации</p>
            <p>Влад всегда готов ответить на ваши вопросы и помочь с любыми запросами.</p>
        </div>
    </div>

    <h2 class="mt-5 mb-4">Почему выбирают нас?</h2>
    <ul class="">
        <li>Широкий выбор круизов по всему миру.</li>
        <li>Конкурентоспособные цены и специальные предложения.</li>
        <li>Индивидуальный подход к каждому клиенту.</li>
        <li>Поддержка на всех этапах вашего путешествия.</li>
    </ul>

</div>

@endsection