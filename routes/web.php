<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\ReadbookController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;

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


Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');

Route::match(['get', 'post'], '/register', [RegisterController::class, 'register'])->name('register');



Route::middleware('auth')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    //page User
    Route::get('user/{email}', [HomeController::class, 'personalPage'])->name('user');
    Route::patch('user/{email}', [HomeController::class, 'personalPage'])->name('updateUser');

    Route::group(['prefix'=>'blog'], function(){
        //Index
        Route::get('/', [BlogController::class, 'index'])->name('blog');
        //Create Post
        Route::get('/createPost', [BlogController::class, 'create'])->name('create');
        Route::post('/createPost', [BlogController::class, 'create'])->name('create');
        //Show Post
        Route::get('/show/{slug}', [BlogController::class, 'show'])->name('show');
        // Show my article
        Route::get('/myArticle', [BlogController::class, 'myArticle'])->name('myArticle');
        // Edit Post
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
        // Update Post 
        Route::patch('/update/{id}', [BlogController::class, 'update'])->name('update');
        // Delete Post
        Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('delete');
        
        
        //Feedback
        Route::get('/feedback', [BlogController::class, 'feedback'])->name('feedback');
        Route::post('/feedback', [BlogController::class, 'feedback'])->name('feedback');

    });
    
    // Route::group(['prefix'=>'readbook'], function(){
    //     Route::get('/', [ReadbookController::class, 'index'])->name('readbook');
    // });
    

});

