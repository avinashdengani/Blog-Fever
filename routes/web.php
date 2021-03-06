<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [FrontendController::class, 'index']);
Route::get('/blogs/{post}', [FrontendController::class, 'show'])->name('blogs.show');
Route::get('/blogs/category/{category}', [FrontendController::class, 'category'])->name('blogs.category');
Route::get('/blogs/tag/{tag}', [FrontendController::class, 'tag'])->name('blogs.tag');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Application Routes
Route::middleware(['auth'])->group(function() {
    Route::resource('categories', CategoriesController::class);
    Route::resource('tags', TagsController::class);
    Route::get('/posts/requests', [PostsController::class, 'publishPostRequest'])->name('posts.requests');
    Route::put('/posts/requests/approve/{id}', [PostsController::class, 'approvePostRequest'])->name('posts.requests.approve');
    Route::put('/posts/requests/disapprove/{id}', [PostsController::class, 'disapprovePostRequest'])->name('posts.requests.disapprove');
    Route::delete('posts/trash/{post}', [PostsController::class, 'trash'])->name('posts.trash');
    Route::get('posts/trashed', [PostsController::class, 'trashed'])->name('posts.trashed');
    Route::get('posts/draft', [PostsController::class, 'draft'])->name('posts.draft');
    Route::put('posts/restore/{post}', [PostsController::class, 'restore'])->name('posts.restore');
    Route::resource('posts', PostsController::class);

});

Route::middleware(['auth', 'verifyAdmin'])->group(function () {
    Route::get('/users',[UsersController::class, 'index'])->name('users.index');
    Route::put('/users/{user}/make-admin',[UsersController::class, 'makeAdmin'])->name('users.make-admin');
    Route::put('/users/{user}/revoke-admin',[UsersController::class, 'revokeAdmin'])->name('users.revoke-admin')->middleware('verifyAdminCount');

});

//NOTE: Used raw url to delete category of category.destroy using javascript
