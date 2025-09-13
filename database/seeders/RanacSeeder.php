<?php

namespace Database\Seeders;

use App\Models\Ranac;
use Illuminate\Database\Seeder;

class RanacSeeder extends Seeder
{
    public function run(): void
    {
        Ranac::updateOrCreate(
            ['model' => 'Trek 50'],
            ['zapremina' => 50, 'tezina' => 1.45, 'price' => 10999]
        );

        Ranac::updateOrCreate(
            ['model' => 'Alp 35'],
            ['zapremina' => 35, 'tezina' => 1.20, 'price' => 8999]
        );
    }
}
