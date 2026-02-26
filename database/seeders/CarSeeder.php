<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\User;
use App\Models\Tag;
use Faker\Factory as Faker;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::where('role', 'Aanbieder')->get();
        $tags = Tag::all();

        for ($i = 0; $i < 250; $i++) {
            $car = Car::create([
                'user_id' => $users->random()->id,
                'kenteken' => strtoupper($faker->unique()->bothify('??###??')),
                'merk' => $faker->company(),
                'model' => $faker->word(),
                'bouwjaar' => $faker->numberBetween(1990, 2024),
                'prijs' => $faker->numberBetween(5000, 80000),
                'image' => null,
            ]);

            $car->tags()->attach($tags->random(rand(1,3))->pluck('id')->toArray());
        }
    }
}
