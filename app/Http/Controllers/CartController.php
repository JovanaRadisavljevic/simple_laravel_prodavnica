<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index(){
        //uzmi char koji je vezan za tog korisnika i prikazi njegove stavke
        //$auth_id = Auth::id();
        $auth_id=2;
        $cart = Cart::query()
        ->where('user_id',$auth_id)
        ->with('items')->first();

        return view('cart', [
            'cart'      => $cart,
            'cartItems' => $cart->items,
            'total'     => $cart->items->sum('subtotal'),
        ]);
    }
    public function destroy($type, $id){
        // $cart = Auth::user()->cart;
        $cart = Cart::find(1);
        $cart->items()
            ->where('product_type', $type)
            ->where('product_id', $id)
            ->delete();
            
        return redirect()->back()->with('success', 'Stavka je uklonjena iz korpe.');
    }
}
