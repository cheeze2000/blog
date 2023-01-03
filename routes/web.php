<?php

use App\Http\Controllers\PostController;
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
        'url' => url('/'),
        'imageUrl' => url('/apple-touch-icon.png'),
    ]);
});

Route::get('/posts/{id}/{slug?}', [PostController::class, 'view']);

Route::prefix('oauth')->group(function () {
    Route::get('/redirect', function () {
        session(['redirect_url' => url()->previous()]);

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
        $url = session('redirect_url', '/');

        return redirect($url);
    });

    Route::get('/logout', function () {
        Auth::logout();

        return back();
    });
});
