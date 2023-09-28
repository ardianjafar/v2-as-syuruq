<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\{BlogController,DashboardController, PostController, TagController, CategoryController, UserController, FileManagerController, RoleController,ContactFormController};

Route::get('/', [BlogController::class, 'home'])->name('home');
Route::get('/blogs', [BlogController::class, 'post'])->name('indexBlogs');
Route::get('/blog/detail/{slug}', [BlogController::class, 'detailBlogs'])->name('detailBlogs');
// ==========
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/dashboard', view('administrator.dashboard.index'));
Route::post('contact', [ContactFormController::class, 'store'])->name('contactForm');
Auth::routes([
    'register' => false
]);

Route::group(['prefix' => '/dashboard', 'middleware' => ['web','auth']], function(){
    // Profile Admin
    Route::resource('/admin', AdminController::class);

    // Dashboard
    Route::get('/', [DashboardController::class,'index'])->name('dashboard.index');

    /*
        Categories -> CRUD -> CATEGORIES
    */
    Route::get('/categories/select', [CategoryController::class,'select'])->name('categories.select');
    Route::resource('/categories', CategoryController::class);

    /*
    Tags -> CRUD -> TAGS
    */
    Route::get('/tags/select', [TagController::class,'select'])->name('tags.select');
    Route::resource('/tags', TagController::class)->except(['show']);

    /*
    Contact Form -> Read, Delete
    */
    Route::get('/contact-form', [ContactFormController::class,'index'])->name('ctform.index');
    Route::get('/contact-form/{id}', [ContactFormController::class,'show'])->name('ctform.show');
    Route::delete('/contact-form/{id}', [ContactFormController::class,'destroy'])->name('ctform.destroy');

    /*
        Posts -> CRUD
    */
    Route::resource('/posts', PostController::class);

    /*
        Laravel FileManager
    */
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/index',[FileManagerController::class,'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    /*
        Role Permission
    */
    Route::get('/roles/select',[RoleController::class,'select'])->name('roles.select');
    Route::resource('/roles', RoleController::class);
    /*
        User Permission
    */
    Route::resource('/users', UserController::class)->except('show');

    // Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

