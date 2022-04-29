<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RealEstateEntityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('realestateentity/', [RealEstateEntityController::class, 'index'])->name('realestateentity.index');
Route::post('realestateentity/store', [RealEstateEntityController::class, 'store'])->name('realestateentity.store');
Route::put('realestateentity/update/{id}', [RealEstateEntityController::class, 'update'])->name('realestateentity.update');

Route::delete('/realestateentity/{id}', [RealEstateEntityController::class, 'destroy'])->name('realestateentity.destroy');
Route::get('/realestateentity/show/{id}', [RealEstateEntityController::class, 'show'])->name('realestateentity.show');
