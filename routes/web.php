<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Library\BuyerController;
use App\Http\Controllers\Company\BusinessGroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\CompanySetupController;
use App\Http\Controllers\Backend\ItemController;
use App\Http\Controllers\Backend\MMController;

use App\Http\Controllers\Backend\MM\MMInitialController;
use App\Http\Controllers\Backend\MM\JobController;
use App\Http\Controllers\Backend\MM\PODetailsController;
use App\Http\Controllers\Backend\MM\FabricBudgetController;
use App\Http\Controllers\Backend\MM\TrimsBudgetController;
use App\Http\Controllers\Backend\MM\EmbelishmentController;
use App\Http\Controllers\Backend\MM\FabricBookingController;
use App\Http\Controllers\Backend\MM\LabDipController;

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


Route::prefix('company')->group(function(){
    Route::get('/', [CompanySetupController::class, 'index'])->name('mm.index');
    Route::get('/items/table', [ItemController::class, 'index'])->name('mm.index');

    Route::get('/item/tab-content/gmts-item', [ItemController::class, 'gmtsTab']);


    // Route::get('item/list',[CompanySetupController::class,'itemList'])->name('item.list');
    // Route::post('item/store',[CompanySetupController::class,'itemStore'])->name('item.store');
    // Route::delete('item/delete/{id}',[CompanySetupController::class,'itemDelete'])->name('item.delete');

    // MM Item CRUD
    Route::post('items/store', [ItemController::class, 'storeItem'])->name('items.store');
    Route::get('items/edit/{id}', [ItemController::class, 'editItem']);
    Route::post('items/update/{id}', [ItemController::class, 'updateItem']);
    Route::delete('items/delete/{id}', [ItemController::class, 'deleteItem']);

    // size, color, fit, season এর জন্যও একইভাবে রুট বানাবেন
});

Route::get('/mm-initial-setup', [MMController::class, 'mmInitialSetup'])->name('mm.initialSetup');


// routes/web.php
Route::get('/mminitial', [MMInitialController::class, 'mminitial']);
Route::get('/job-entry', [JobController::class, 'jobentry']);
Route::get('/po-details', [PODetailsController::class, 'podetails']);
Route::get('/labdip', [LabDipController::class, 'labdip']);
Route::get('/fabric-budget', [FabricBudgetController::class, 'fabricbudget']);
Route::get('/trims-budget', [TrimsBudgetController::class, 'trimsbudget']);
Route::get('/embelishment-budget', [EmbelishmentController::class, 'embbudget']);
Route::get('/fabric-booking', [FabricBookingController::class, 'fabricbooking']);



// Route::get('/home', function() {
//     return view('admin.partials.home'); // শুধুমাত্র content অংশ
// });
// Route::get('/projects', function() {
//     return view('admin.partials.projects');
// });
// Route::get('/breadcrumb', function() {
//     return view('admin.partials.breadcrumb');
// });
// Route::get('/getting-started', function() {
//     return view('admin.partials.start');
// });
// Route::get('/download', function() {
//     return view('admin.partials.download');
// });
