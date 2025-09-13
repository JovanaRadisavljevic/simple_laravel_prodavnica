<?php

namespace Database\Seeders;

use App\Models\Sator;
use Illuminate\Database\Seeder;

class SatorSeeder extends Seeder
{
    public function run(): void
    {
        Sator::updateOrCreate(
            ['model' => 'Alpin 3'],
            ['sezona' => '3-seasons', 'brOsoba' => 3, 'tezina' => 3.20, 'price' => 19999]
        );

        Sator::updateOrCreate(
            ['model' => 'Summit 2'],
            ['sezona' => '2-seasons', 'brOsoba' => 2, 'tezina' => 2.60, 'price' => 14999]
        );
    }
}
