<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@wheelgoodcars.nl'],
            [
                'name' => 'Admin',
                'password' => 'password',
                'role' => 'Beheerder',
            ]
        );

        User::updateOrCreate(
            ['email' => 'aanbieder@wheelgoodcars.nl'],
            [
                'name' => 'Aanbieder',
                'password' => 'password',
                'role' => 'Aanbieder',
            ]
        );
    }
}
