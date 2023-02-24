<?php
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Get Prodcuts list
// Route::get('/products', [ProductController::class, 'index']);

// // Create product
// Route::post('/products', [ProductController::class, 'store']);

// // Find product
// Route::get('/products', ProductController::class);


// Public Routes
Route::resource('/products', ProductController::class);

// Route::get('/products/search/{name}', [ProductController::class, 'search']);
 
// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/products/search/{name}', [ProductController::class, 'search']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});