<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PasswordController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/locale/{locale}', function ($locale) {
        session()->put('locale', $locale);
        return Redirect::back();
    });


    Route::get('members/search', 'MemberSearchController@index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/member', [MemberController::class, 'index'])->name('member.index');

    Route::get('/balance', [BalanceController::class, 'index'])->name('balance.index');
    Route::get('/balance/create', [BalanceController::class, 'create'])->name('balance.create');
    Route::post('/balance', [BalanceController::class, 'store'])->name('balance.store');
    Route::get('/balance/{balance}/edit', [BalanceController::class, 'edit'])->name('balance.edit');
    Route::put('/balance/{balance}/update', [BalanceController::class, 'update'])->name('balance.update');
    //Route::get('/balance/{balance}/info', [BalanceController::class, 'info'])->name('balance.info');
    Route::get('/balance/{balance}/ticket', [BalanceController::class, 'ticket'])->name('balance.ticket');
    Route::get('/balance/{year}/createTicket', [BalanceController::class, 'createTicket'])->name('balance.createTicket');
    Route::post('/balance', [BalanceController::class, 'storeTicket'])->name('balance.storeTicket');
    Route::get('/balance/create', [BalanceController::class, 'create'])->name('balance.create');

    //Chart
    Route::get('/balance/chart', [BalanceController::class, 'chart'])->name('balance.chart');
    Route::get('/balance/{balance}/info', [BalanceController::class, 'infoChart'])->name('balance.info');

    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    Route::post('/join-group/{task}', [TaskController::class, 'joinGroup'])->name('task.joinGroup');
    Route::delete('/task/{task}/leave-group', [TaskController::class, 'leaveGroup'])->name('task.leaveGroup');
    Route::post('/task', [TaskController::class, 'store'])->name('task.store');
    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');

    Route::get('/idea', [IdeaController::class, 'index'])->name('idea.index');
    //Route::get('/idea', [IdeaController::class, 'indexSorted'])->name('idea.index');
    Route::put('/idea/{idea}/update', [IdeaController::class, 'update'])->name('idea.update');
    Route::post('/idea', [IdeaController::class, 'store'])->name('idea.store');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/export-db', [AdminController::class, 'exportDB'])->name('admin.exportDB');
    Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
    Route::get('/admin/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/admin/edit/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');
    Route::put('/admin/edit/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');

    Route::delete('/admin/edit/{id}/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::put('/admin/edit/{id}/password', [PasswordController::class, 'updateAdmin'])
        ->middleware(['auth'])
        ->name('password.updateAdmin');






});

require __DIR__ . '/auth.php';