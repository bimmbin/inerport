<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DesignController;
use App\Http\Controllers\Auth\MakeNewAdminPasswordController;
use App\Http\Controllers\Schema\SchemaController;
use App\Http\Controllers\WebDev\WebDevController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/admin/makepassword', [MakeNewAdminPasswordController::class, 'index'])->name('admin.make.password');
  Route::post('/admin/makepassword/store', [MakeNewAdminPasswordController::class, 'store'])->name('admin.make.password.store');
});

Route::resource('web-development', WebDevController::class)->except([
  'update',
  'destroy',
]);;

Route::post('/web-development/{id}', [WebDevController::class, 'update'])->name('web-development.update');
Route::post('/web-development/{id}/delete', [WebDevController::class, 'destroy'])->name('web-development.destroy');


Route::resource('ui-design', DesignController::class);
Route::resource('database-schema', SchemaController::class);



require __DIR__ . '/auth.php';
