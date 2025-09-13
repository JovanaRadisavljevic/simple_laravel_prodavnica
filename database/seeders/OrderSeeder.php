<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use App\Models\Sator;
use App\Models\Ranac;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'filip@example.com')->first()
              ?? User::first(); // fallback ako nema tog mejla

        $sator = Sator::where('model', 'Alpin 3')->first() ?? Sator::first();
        $ranac = Ranac::where('model', 'Trek 50')->first() ?? Ranac::first();

        DB::transaction(function () use ($user, $sator, $ranac) {
            $order = Order::create([
                'user_id'   => $user->id,
                'placed_at' => now(),
                'status'    => 'pending',
                'total'     => 0,
            ]);

            DB::table('stavka_order')->insert([
                [
                    'order_id'     => $order->id,
                    'product_type' => 'sator',
                    'product_id'   => $sator->id,
                    'quantity'     => 1,
                    'unit_price'   => $sator->price,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ],
                [
                    'order_id'     => $order->id,
                    'product_type' => 'ranac',
                    'product_id'   => $ranac->id,
                    'quantity'     => 2,
                    'unit_price'   => $ranac->price,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ],
            ]);

            $sum = DB::table('stavka_order')
                ->where('order_id', $order->id)
                ->selectRaw('SUM(quantity * unit_price) as s')
                ->value('s');

            $order->update(['total' => $sum]);
        });
    }
}
