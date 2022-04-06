<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

//HOME-------------------------------------------------------
Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('/home', [PostsController::class, 'index'])->name('home');
Route::get('/search', [PostsController::class, 'searchArticle']);
Route::get('/latest', [PostsController::class,'latest'])->name('latest');


//AUTH (login & register)------------------------------------
Route::get("register", [UserController::class, 'registerForm']);
Route::post("register/create", [UserController::class, 'store']);
Auth::routes();

//MEMBER ARTICLES
Route::get('/my_articles', [PostsController::class, 'myArticle'])->name('my_articles');
Route::get('/article',[PostsController::class,'article']);
Route::post("/article",[PostsController::class,"save_article"]);

//CATEGORIES
Route::get('/categories/all', [CategoriesController::class, 'showAll'])->name('categories.all');
Route::resource('/categories', CategoriesController::class);
Route::get('/category/{id}', [PostsController::class, 'showByCategory']);

Route::resource('/posts', PostsController::class);

//Admin--------------------------------------------------------
Route::group(['prefix'=>'/admin'], function(){
    //articles
    Route::get('/articles', [PostsController::class, 'adminShowAll'])->name('admin.articles');
    Route::get('/articles/published', [PostsController::class, 'adminShowPublished']);
    Route::get('/articles/pending',[PostsController::class,'adminShowPending']);
    Route::get('/articles/rejected', [PostsController::class, 'adminShowRejected']);
    Route::post('/verification/{id}',[PostsController::class,'verifyPending'])->name('admin.verify');
    Route::post('/deleteArticle/{id}',[PostsController::class,'destroyArticle']);
    Route::get('/articles/category_update/{id}', [PostsController::class,'showCategoryUpdate']);
    Route::post('/articles/category_update/{id}', [PostsController::class,'articleCategoryUpdated']);

    //categories
    Route::get('/categories', [CategoriesController::class, 'adminShowAll']);
    Route::delete('/categories/delete/{id}', [CategoriesController::class, 'destroy']);
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit']);
    Route::put('/categories/edit/{id}', [CategoriesController::class, 'update']);
    Route::get('/categories/create', [CategoriesController::class, 'create']);
    Route::post('/categories/create', [CategoriesController::class, 'store']);
});