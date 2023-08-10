<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('template.index');
    })->name('dashboard');
});

Route::domain('{subdomain}.pbresultvault.local')->group(function () {
    // Routes for the subdomains (e.g., school subdomains)
    Route::get('/', 'SubdomainController@index')->name('subdomain.dashboard');
    // Other subdomain routes...
});

Route::post('/school/store', [SchoolController::class, 'SchoolStore'])->name('school.store');
