<div class="header"> 
    <img class="hbackground" src="{{ url('storage/GUI/Header Background.svg') }}" alt="" title="" style=""/> 
    <div class="headernav d-flex align-items-center"> 
        <div class="logo-container">
            <button class="btn logo"><img src="{{ url('storage/GUI/Logo.svg') }}" alt="" title="" style="width: 130px"/></button> 
        </div> 
        <button class="btn burger-button"><img src="{{ url('storage/GUI/Burger Menu.svg') }}" class="burgerMenuButton" alt="" title=""/></button> 
        <button class="btnnav" data-toggle="button" aria-pressed="true">КРУИЗЫ</button> 
        <button class="btnnav">КОРАБЛИ</button> 
        <button class="btnnav">ПРИБЫТИЯ</button> 
        <button class="btnnav create-cruise-btn">СОЗДАТЬ КРУИЗ</button> 
        <button class="search-button"><img src="{{ url('storage/GUI/Search Button.svg') }}" class="SearchButton" alt="" title=""/></button> 
        @if(Auth::check())
        <div class="user" style="color: white">
            <button class="cabinetButton">{{ Auth::user()->name }}</button>
        </div>
            <a href="{{ route('logout') }}"><button type="button" class="btn btn-danger leave" style="scale: 0.8; border-radius: 20px"><i class="fa-solid fa-arrow-right-from-bracket"></i></button></a>
            @else
            <div class="row buttons-container">
                <a href="{{ route('login') }}">
                    <button type="button" class="btnnav auth-button"><i class="fa-solid fa-arrow-right-from-bracket"></i>Войти</button>
                </a>
                <a href="{{ route('register.create') }}">
                    <button type="button" class="btnnav auth-button"><i class="fa-solid fa-arrow-right-from-bracket"></i> Регистрация</button>
                </a>
            </div>
            @endif
    </div> 
</div>
