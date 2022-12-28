<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Homepage', [
        'user' => Auth::user(),
    ]);
});

Route::prefix('oauth')->group(function () {
    Route::get('/redirect', function () {
        return Socialite::driver('github')
            ->setScopes([])
            ->redirect();
    });

    Route::get('/callback', function () {
        $data = Socialite::driver('github')->user();
        $user = User::updateOrCreate(
            ['id' => $data->id],
            ['username' => $data->nickname, 'avatar' => $data->avatar],
        );

        Auth::login($user);

        return redirect('/');
    });
});
