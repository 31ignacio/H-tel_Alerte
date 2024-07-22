<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::prefix('hotel')->group(function () {

Route::get('/', [AccueilController::class, 'index'])->name('hotel.accueil');
Route::get('/listeHotel', [HotelController::class, 'listeHotel'])->name('hotel.liste');
Route::post('/change-password', [AuthController::class, 'update'])->name('password.update');

Route::get('/hotel', [HotelController::class, 'create'])->name('hotel.create');
Route::post('/store', [HotelController::class, 'store'])->name('hotel.store');
Route::get('/profil', [HotelController::class, 'profil'])->name('hotel.profil');
Route::get('/mesAnnonces', [HotelController::class, 'MesAnnonces'])->name('hotel.mesAnnonces');
Route::get('/{id}', [HotelController::class, 'show'])->name('hotelPays.show');
Route::put('/hotelPays/{id}/activer', [HotelController::class, 'activer'])->name('hotelPays.activer');
Route::put('/hotelPays/{id}/desactiver', [HotelController::class, 'desactiver'])->name('hotelPays.desactiver');
Route::post('/update/{hotel}/profil', [HotelController::class, 'updateProfil'])->name('hotel.update');
Route::post('/update/{hotel}/annonce', [HotelController::class, 'updateSignalement'])->name('hotel.profil.update');

Route::post('/update/{client}', [HotelController::class, 'updateSignalement'])->name('signalement.update');
Route::get('/contact/client', [AccueilController::class, 'contact'])->name('hotel.contact');
Route::get('/test-view', [AccueilController::class, 'testView'])->name('hotel.testView');
Route::post('/postMessage', [AccueilController::class, 'postMessage'])->name('hotel.postMessage');


Route::get('/signalement/client', [ClientController::class, 'index'])->name('client.liste');
Route::get('/create/client', [ClientController::class, 'create'])->name('client.create');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/showClient/{id}', [ClientController::class, 'show'])->name('client.show');
Route::post('/recherche/search', [ClientController::class, 'recherche'])->name('client.recherche');
Route::delete('/client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');


Route::get('hummm/mail',[EmailController::class, 'sendWelcomeEmail']);

Route::get('/files/{filename}', function ($filename) {
    $path = public_path('files/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('files.show');


// });
