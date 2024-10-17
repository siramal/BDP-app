<?php
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::prefix('/food')->name('food.')->group(function () {
    Route::get('/create', [FoodController::class, 'create'])->name('create');
    Route::post('/store', [FoodController::class, 'store'])->name('store');
    Route::get('/', [FoodController::class, 'index'])->name('home');
    Route::get('/{id}', [FoodController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [FoodController::class, 'update'])->name('update');
    Route::delete('/{id}', [FoodController::class, 'destroy'])->name('delete');
});
