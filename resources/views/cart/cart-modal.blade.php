@if($cruiseOrders->isEmpty())
    <p>Ваша корзина пуста.</p>
@else
    <ul class="list-group">
        @foreach($cruiseOrders as $order)
            <li class="list-group-item cart-list" style="background-image: url({{ $order->getImage() }});">
                <a href="{{ route('show', ['slug' => $order->slug]) }}"
                    style="text-decoration: none; color:#012840">
                <h5 class="cart-title">{{ $order->title }} — {{ $cart[$order->id] }} шт.</h5>
                </a>
                {{ $order->departure->name }} <i class="fa-solid fa-arrow-right"></i> {{ $order->destination->name }} <br>
                {{ $order->date->date }} <br>
                <i class="fa-solid fa-moon"></i> {{ $order->nights }}
                    <span class="cart-price">
                        @if ($order->sale == 0)
                        {{ $order->price }}$
                        @else
                        <span style="font-size: 15px;text-decoration: line-through; text-decoration-thickness: 1px; text-decoration-color: yellow;">
                            {{ $order->price }}$</span> {{ $order->price - $order->price / 100 * $order->sale}}$
                        @endif
                    </span>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <button class="cart-order-item" 
                        data-id="{{ $order->id }}" 
                        data-url="{{ route('cart.order') }}">Забронировать <i class="fa-solid fa-book" style="color: #ffffff;"></i></button>

                <button class="cart-remove-item" data-id="{{ $order->id }}" data-url="{{ url('/cart/del-item') }}"><i class="fa-solid fa-xmark" style="color: #ffffff;"></i></button>
            </li>
        @endforeach
    </ul>
@endif