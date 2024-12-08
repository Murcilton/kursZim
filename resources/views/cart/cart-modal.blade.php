@if($cruiseOrders->isEmpty())
    <p>Ваша корзина пуста.</p>
@else
    <ul>
        @foreach($cruiseOrders as $order)
            <li>
                {{ $order->title }} — {{ $cart[$order->id] }} шт.
                <button class="cart-remove-item" data-id="{{ $order->id }}" data-url="{{ url('/cart/del-item') }}">Удалить</button>
            </li>
        @endforeach
    </ul>
@endif