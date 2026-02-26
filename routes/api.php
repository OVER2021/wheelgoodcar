<?php

use Illuminate\Support\Facades\Route;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/admin/stats', function () {
    $totalCars =        Car::count          ();
    $soldCars =         Car::whereNotNull   ('sold_at')->                   count();
    $todayCars =        Car::whereDate      ('created_at',          now()->toDateString())->count();
    $totalUsers =       User::where         ('role', 'Aanbieder')-> count();
    $viewsToday =       Car::whereDate      ('updated_at',          now()->toDateString())->sum('views');
    $avgCarsPerUser =   $totalUsers         > 0 ? round($totalCars / $totalUsers, 2) : 0;

    return response()->json([
        'total_cars' =>         $totalCars,
        'sold_cars' =>          $soldCars,
        'today_cars' =>         $todayCars,
        'total_users' =>        $totalUsers,
        'views_today' =>        $viewsToday,
        'avg_cars_per_user' =>  $avgCarsPerUser
    ]);
});
