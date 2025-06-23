<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

//use App\Models\User;

/* Route::get('/', function () {
    return view('welcome');
})->name('home'); */


Route::get('/', function () {
    return view('otro_template');
})->name('home');

/* Route::get('/ej', function () {

    //$rol = auth()->user()->getRoleNames();

    //return var_dump($rol);
    //return response()->json($rol);
    

    return auth()->user()->hasRole('veterinarian')  ? response()->json('ok'): response()->json('no');
}); */

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
