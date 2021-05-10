<?php

use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

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


Route::get(
    '/',
    function () {
        return view('templates.index');
    }
);



Auth::routes();

Route::get('/test-contact', function () {
    return new App\Mail\ContactEmail(new Contact([1], '2', '3'));
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

Route::patch('contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::get('contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
Route::get('contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');

Route::get('contact/{id}', [ContactController::class, 'delete'])->name('contact.delete');
