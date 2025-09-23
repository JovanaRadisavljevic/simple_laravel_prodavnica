<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Ranac;
use App\Models\Sator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index(){
        if (!Auth::check()) {
            return redirect('/')->withErrors(['Greska' => 'Uloguj se da vidiš korpu.']);
        }

        $auth_id = Auth::id();
        $cart = Cart::firstOrCreate(['user_id'=>$auth_id]);
        $items = $cart->items ?? collect();

        return view('cart', [
            'cart'      => $cart,
            'cartItems' => $items,
            'total'     => $items->sum('subtotal'),
        ]);
    }
    public function destroy($type, $id){
        $cart = Auth::user()?->cart;
        if (!$cart) {
            return back()->with('error', 'Korpa nije pronađena.');
        }
        $cart->items()
            ->where('product_type', $type)
            ->where('product_id', $id)
            ->delete();
            
        return redirect()->back()->with('success', 'Stavka je uklonjena iz korpe.');
    }
    function store($type,$id) {
        $user_id=Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $item = $cart->items()
        ->where('product_type',$type)
        ->where('product_id',$id)
        ->first();

        if($item){
            $item->increment('quantity');
            $item->update(['subtotal' => $item->quantity * $item->price_snapshot]);
        }else{
            $price = $type === 'sator' ?
            Sator::findOrFail($id)->price :
            Ranac::findOrFail($id)->price;
            $cart->items()->create([
                'product_type'   => $type,
                'product_id'     => $id,
                'quantity'       => 1,
                'price_snapshot' => $price,
                'subtotal'       => $price,
            ]);
        }
        return redirect()->back()->with('success', 'Proizvod je dodat u korpu!');
    }
}
