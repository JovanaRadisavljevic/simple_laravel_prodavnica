<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Sator;
use App\Models\Ranac;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'filip@example.com')->first()
              ?? User::first();

        $sator = Sator::where('model', 'Alpin 3')->first() ?? Sator::first();
        $ranac = Ranac::where('model', 'Trek 50')->first() ?? Ranac::first();

        DB::transaction(function () use ($user, $sator, $ranac) {
            $cart = Cart::create([
                'user_id' => $user->id,
            ]);

            $cart->items()->create([
                'product_id'   => $sator->id,
                'product_type' => \App\Models\Sator::class,
                'quantity'     => 1,
                'price_snapshot' => $sator->price,
                'subtotal'       => $sator->price * 1,
            ]);

            $cart->items()->create([
                'product_id'   => $ranac->id,
                'product_type' => \App\Models\Ranac::class,
                'quantity'     => 2,
                'price_snapshot' => $ranac->price,
                'subtotal'       => $ranac->price * 2,
            ]);
        });
    }
}
