<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CruiseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $cruiseId = $request->input('cruise_id'); // Получаем cruise_id из запроса
        $qty = (int) $request->input('qty', 1); // Количество (по умолчанию 1)
    
        $cart = session()->get('cart', []); // Загружаем корзину из сессии
        if (isset($cart[$cruiseId])) {
            $cart[$cruiseId] += $qty; // Увеличиваем количество
        } else {
            $cart[$cruiseId] = $qty; // Добавляем новый элемент
        }
        session()->put('cart', $cart); // Сохраняем обновленную корзину
    
        return response()->json([
            'success' => true,
            'cart_qty' => array_sum($cart), // Суммируем все товары в корзине
        ]);
    }

    public function show()
    {
        $cart = session('cart', []);
        $cruiseOrders = CruiseOrder::whereIn('id', array_keys($cart))->get();
    
        // Для отладки
        return view('cart.cart-modal', compact('cruiseOrders', 'cart'));
    }

public function delItem($product_id)
{
    $cart = session()->get('cart', []);
    unset($cart[$product_id]);
    session()->put('cart', $cart);

    return response()->json([
        'success' => true,
        'cart_qty' => array_sum($cart),
    ]);
}

public function clear()
{
    session()->forget('cart');
    return response()->json([
        'success' => true,
    ]);
}

}
