<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Livewire\Posts;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

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

Route::get('/', [PostController::class,'index'])->name('post.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Posts::class)->name('dashboard');
});

Route::get('/post',[PostController::class, 'create'])->name('post.create');
Route::get('/post/{post}',[PostController::class, 'show'])->name('post.show');

/* Fixed */
Route::get('/terminos', function(){
    return view('fixed.terms');
})->name('terminos');

Route::get('/conocenos', function () {
 return view('fixed.knowus');
})->name('knowus');

/* Contact */
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
