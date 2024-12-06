<div class="header">
    @if(Auth::check() && Auth::user()->is_admin == 1)
    <img class="hbackground" src="{{ url('storage/GUI/Header Background Admin.svg') }}" alt="" title="" style="top: -70px; height:220px"/> 
    @else
    <img class="hbackground" src="{{ url('storage/GUI/Header Background.svg') }}" alt="" title="" style=""/> 
    @endif
    <div class="headernav d-flex align-items-center"> 
        <div class="logo-container">
            <a href="{{ route('home') }}"><button class="btn logo"><img src="{{ url('storage/GUI/Logo.svg') }}" alt="" title="" style="width: 130px"/></button></a>
        </div> 
        @if(Auth::check() && Auth::user()->is_admin == 1)
        <div class="admin">
            <a href="{{ route('admin') }}"><button type="button" class="adminButton"><i class="fa-solid fa-user-tie fa-2xl" style="color: #ffffff;"></i></button></a>
        </div>
        @endif
        <button class="btn burger-button"><img src="{{ url('storage/GUI/Burger Menu.svg') }}" class="burgerMenuButton" alt="" title=""/></button> 
        <a href="{{ route('cruises') }}"><button class="btnnav" data-toggle="button" aria-pressed="true">КРУИЗЫ</button> </a>
        <a href="{{ route('ships') }}"><button class="btnnav" data-toggle="button" aria-pressed="true">КОРАБЛИ</button> </a>
        <button class="btnnav">ПРИБЫТИЯ</button> 
        <button class="btnnav">О НАС</button> 
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
