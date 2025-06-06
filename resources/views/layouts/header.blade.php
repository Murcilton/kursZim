<div class="header">
    @if (Auth::check() && Auth::user()->is_admin == 1)
        <img class="hbackground" src="{{ url('storage/GUI/Header Background Admin.svg') }}" alt="" title=""
            style="top: -70px; height:220px" />
    @else
        <img class="hbackground" src="{{ url('storage/GUI/Header Background.svg') }}" alt="" title=""
            style="" loading="lazy"/>
    @endif
    <div class="headernav d-flex align-items-center">
        <div class="logo-container">
            <a href="{{ route('home') }}"><button class="btn logo"><img src="{{ url('storage/GUI/Logo.svg') }}"
                        alt="" title="" style="width: 130px" loading="lazy"/></button></a>
        </div>
        @if (Auth::check() && Auth::user()->is_admin == 1)
            <div class="admin">
                <a href="{{ route('admin') }}"><button type="button" class="adminButton"><i
                            class="fa-solid fa-user-tie fa-2xl" style="color: #ffffff;"></i></button></a>
            </div>
        @endif
        <button class="btnnav burger-button" data-url="{{ route('cart.show') }}" data-token="{{ csrf_token() }}">
            <i class="fa-solid fa-cart-shopping fa-xl" style="color: #ffffff;"></i>
            <span class="badge badge-light mini-cart-qty">{{ array_sum(session('cart', [])) }}</span>
        </button>
        <a href="{{ route('cruises') }}"><button class="btnnav" data-toggle="button"aria-pressed="true">КРУИЗЫ</button>
        </a>
        <a href="{{ route('ships') }}"><button class="btnnav" data-toggle="button" aria-pressed="true">КОРАБЛИ</button>
        </a>
        <a href="{{ route('dests') }}"><button class="btnnav" data-toggle="button"
                aria-pressed="true">РЕГИОНЫ</button>
        </a>
        <a href="{{ route('about-us') }}" style="position: relative; z-index:100"><button class="btnnav">О НАС</button></a>

<div class="dropdown">
  <input type="checkbox" id="dropdown" class="btnnav search-button">

  <label class="dropdown__face" for="dropdown">
    <div class="dropdown__text"><img src="{{ url('storage/GUI/Search Button.svg') }}" class="SearchButton" alt="" title="" style="color: #012840" loading="lazy"/></div>

  </label>

  <ul class="dropdown__items">
    <li>
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="query" placeholder="Поиск" class="form-control search-input" placeholder="" aria-label="" aria-describedby="basic-addon1">
    </li>
    <li>
        <button type="submit" class="search-submit"><i class="fa-solid fa-check" style="color: #012840;"></i></button>
    </form>
    </li>
  </ul>
</div>

<svg>
  <filter id="goo">
    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
    <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
    <feBlend in="SourceGraphic" in2="goo" />
  </filter>
</svg>


        @if (Auth::check())
            <div class="user d-flex align-items-center" style="color: white">
                <button class="cabinetButton">{{ Auth::user()->name }}</button>
                <a href="{{ route('logout') }}"><button type="button" class="btn btn-danger leave"
                        style="scale: 0.8; border-radius: 20px"><i
                            class="fa-solid fa-arrow-right-from-bracket"></i></button></a>
            </div>
        @else
            <div class="row buttons-container">
                <a href="{{ route('login') }}">
                    <button type="button" class="btnnav auth-button1"><i
                            class="fa-solid fa-arrow-right-from-bracket"></i> Войти</button>
                </a>
                <a href="{{ route('register.create') }}">
                    <button type="button" class="btnnav auth-button2"><i
                            class="fa-solid fa-arrow-right-from-bracket"></i> Регистрация</button>
                </a>
            </div>
        @endif

    </div>
    <nav role="navigation">
        <div id="menuToggle">
            <input type="checkbox" id="menuCheckbox" />
            <span></span>
            <span></span>
            <span></span>

            <ul id="menu" class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('cruises') }}"><button class="btnnav"
                            data-toggle="button"aria-pressed="true">КРУИЗЫ<i class="fa-solid fa-clipboard-list"
                                style="position: relative; margin-left: auto; color:#ffffff"></i></button>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('ships') }}"><button class="btnnav" data-toggle="button"
                            aria-pressed="true">КОРАБЛИ<i class="fa-solid fa-ship"
                                style="position: relative; left: 5px;"></i></button>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('dests') }}"><button class="btnnav" data-toggle="button"
                            aria-pressed="true">ПРИБЫТИЯ<i class="fa-solid fa-location-dot"
                                style="position: relative; left: 5px;"></i>
                </li></button>
                </li>
                </a>
                <li class="list-group-item">
                    <a href="{{ route('about-us') }}" style="color: white"><button class="btnnav">О НАС<i class="fa-solid fa-circle-info"
                            style="color: #ffffff; position: relative; left: 5px;"></i></button></a>
                </li>

                {{-- <li class="list-group-item search-form">
                    <div class="">
                        <form action="" class="">
                        <input type="text" placeholder="Поиск2" class="form-control search-input" placeholder="" aria-label="" aria-describedby="basic-addon1">
                        <button type="submit" class="search-submit"><i class="fa-solid fa-check" style="color: #012840;"></i></button>
                      </form>
                    </div>
                </li> --}}
            </ul>
        </div>
        <style>
            #menu button {
                position: relative;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 10px;
            }

            #menu button i {
                margin-right: 10px
            }
        </style>
    </nav>
</div>
