<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OccupationAreaController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [OccupationAreaController::class, 'welcome'])->name('occupationArea.welcome');
Route::get('/about', [OccupationAreaController::class, 'about'])->name('about.index');
Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::get('/contact', [CompanyController::class, 'index'])->name('contact.index');
Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');


//users route
Route::get('/users', [Controller::class, 'users'])->name('users');
Route::get('/users/create', [Controller::class, 'create'])->name('users.create');
Route::post('/users/store', [Controller::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [Controller::class, 'edit'])->name('users.edit');
Route::post('/users/update/{id}', [Controller::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}', [Controller::class, 'delete'])->name('users.destroy');


//Documents routes
Route::get('/documents', [DocumentController::class, 'documents'])->name('documents');
Route::get('/documents/{id}', [DocumentController::class, 'show'])->name('documents.show');

Route::get('/documents/new', [DocumentController::class, 'teste'])->name('documents.new');

Route::post('/documents/store', [DocumentController::class, 'store'])->name('documents.store');
Route::get('/documents/edit/{id}', [DocumentController::class, 'edit'])->name('documents.edit');
Route::post('/documents/update/{id}', [DocumentController::class, 'update'])->name('documents.update');
Route::delete('/documents/delete/{id}', [DocumentController::class, 'delete'])->name('documents.destroy');

Route::get('/area-de-atuacao/{id}', [OccupationAreaController::class, 'show'])->name('area_de_atuacao');
Route::get('/area-de-atuacao', [OccupationAreaController::class, 'index'])->name('area_de_atuacao');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [Controller::class , 'dashboard'])->name('dashboard');
});


//client
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
Route::post('/client/update/{id}', [ClientController::class, 'update'])->name('client.update');
Route::delete('/client/delete/{id}', [ClientController::class, 'delete'])->name('client.destroy');
Route::get('/client/login', [ClientController::class, 'login'])->name('client.login');
Route::post('/client/enter', [ClientController::class, 'enter'])->name('client.enter');
Route::get('client/dashboard', [ClientController::class, 'ClientDashboard'])->name('client.dashboard');
