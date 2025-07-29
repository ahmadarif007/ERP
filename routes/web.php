<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Library\BuyerController;
use App\Http\Controllers\Company\BusinessGroupController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ==================================== Dashboard Part ==================================
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// ==================================== Order Entry Section ==================================
Route::get('/order/entry', [DashboardController::class, 'orderEntry'])->name('orderEntry');
Route::get('/pre-costing', [DashboardController::class, 'precosting'])->name('precosting');
Route::post('/item/save', [DashboardController::class, 'itemSave'])->name('items.store');


Route::get('supplier', [LibraryController::class, 'addSupplier']);
Route::post('save/supplier/', [LibraryController::class, 'storeSupplier'])->name('supplier.store');
Route::get('new/supplier/', [LibraryController::class, 'addSupplier']);
Route::get('new/supplier/', [LibraryController::class, 'addSupplier']);


// ======================================== Business, Unit ============================================
// Route::get('/business/group', [LibraryController::class, 'index']);
Route::get('/unit', [BuyerController::class, 'index']);


// ========================================== Company, Buyer, Brand, Party Type =========================================
Route::get('/company', [LibraryController::class, 'index']);
Route::get('/buyer', [BuyerController::class, 'index']);


Route::get('/business-groups', [BusinessGroupController::class, 'index'])->name('business-groups.index');
Route::post('/business-groups/store', [BusinessGroupController::class, 'store'])->name('business-groups.store');
Route::get('/business-groups/edit/{id}', [BusinessGroupController::class, 'edit'])->name('business-groups.edit');
Route::post('/business-groups/update/{id}', [BusinessGroupController::class, 'update'])->name('business-groups.update');
Route::get('/business-groups/delete/{id}', [BusinessGroupController::class, 'destroy'])->name('business-groups.destroy');

Route::get('/business-groups/data', [BusinessGroupController::class, 'data'])->name('business-groups.data'); // DataTables feed
Route::get('/business-groups/list', [CompanyGroupController::class, 'list'])->name('business-groups.list');



Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users-data', [UserController::class, 'getData'])->name('users.data');
