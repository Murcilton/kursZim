<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CruiseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function order(Request $request)
{
    $request->validate([
        'cruise_order_id' => 'required|exists:cruise_order,id',
    ]);

    $user = auth()->user();

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Необходима авторизация'], 403);
    }

    $user->cruise_order_id = $request->cruise_order_id;
    /** @var \App\Models\User $user **/
    $user->save();

    return response()->json(['success' => true, 'message' => 'Заказ оформлен!']);
}


    public function add(Request $request)
    {
        $cruiseId = $request->input('cruise_id'); 
        $qty = (int) $request->input('qty', 1); 
    
        $cart = session()->get('cart', []); 
        if (isset($cart[$cruiseId])) {
            $cart[$cruiseId] += $qty; 
        } else {
            $cart[$cruiseId] = $qty; 
        }
        session()->put('cart', $cart); 
    
        return response()->json([
            'success' => true,
            'cart_qty' => array_sum($cart),
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
