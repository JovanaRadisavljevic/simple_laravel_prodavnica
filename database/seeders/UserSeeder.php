<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'ime'      => 'Admin',
                'preizme'  => 'Korisnik', 
                'role'     => 'admin',
                'password' => Hash::make('lozinka123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'filip@example.com'],
            [
                'ime'      => 'Filip',
                'preizme'  => 'Ivić',    
                'role'     => 'user',
                'password' => Hash::make('lozinka123'),
            ]
        );
    }
}
