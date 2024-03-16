<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Admin\Http\Controllers\Home\HomeController::class, 'index']);

// login
Route::controller(App\Admin\Http\Controllers\Auth\LoginController::class)
    ->middleware('guest:admin')
    ->prefix('/login')
    ->as('login.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('post');
    });

Route::group(['middleware' => 'admin.auth.admin:admin'], function () {

    //sliders
    Route::prefix('/sliders')->as('slider.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Slider\SliderItemController::class)
            ->prefix('/{slider_id?}')
            ->as('item.')
            ->group(function () {
                Route::get('/item/add', 'create')->name('create');
                Route::get('/item', 'index')->name('index');
                Route::get('/item/edit/{id}', 'edit')->name('edit');
                Route::put('/item/edit', 'update')->name('update');
                Route::post('/item/add', 'store')->name('store');
                Route::delete('/item/delete/{id}', 'delete')->name('delete');
            });
        Route::controller(App\Admin\Http\Controllers\Slider\SliderController::class)->group(function () {
            Route::get('/add', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/edit', 'update')->name('update');
            Route::post('/add', 'store')->name('store');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });
    });

    //page
    Route::controller(App\Admin\Http\Controllers\Page\PageController::class)
        ->prefix('/pages')
        ->as('page.')
        ->group(function () {
            Route::get('/add', 'create')->name('create');
            Route::post('/add', 'store')->name('store');
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/edit', 'update')->name('update');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });


    Route::prefix('/blog')
        ->as('blog.')
        ->group(function () {
            //Post category
            Route::prefix('/categories')->as('category.')->group(function () {
                Route::controller(App\Admin\Http\Controllers\Blog\Category\CategoryController::class)->group(function () {
                    Route::get('/add', 'create')->name('create');
                    Route::get('/', 'index')->name('index');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::put('/edit', 'update')->name('update');
                    Route::post('/add', 'store')->name('store');
                    Route::delete('/delete/{id}', 'delete')->name('delete');
                });
            });
            //Post
            Route::prefix('/posts')->as('post.')->group(function () {
                Route::controller(App\Admin\Http\Controllers\Blog\Post\PostController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'create')->name('create');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::put('/edit', 'update')->name('update');
                    Route::post('/add', 'store')->name('store');
                    Route::delete('/delete/{id}', 'delete')->name('delete');
                    Route::post('/action-multile-record', 'actionMultipleRecode')->name('action_multiple_record');
                });
            });

            //Tags
            Route::prefix('/tags')->as('tag.')->group(function () {
                Route::controller(App\Admin\Http\Controllers\Blog\Tag\TagController::class)->group(function () {
                    Route::get('/add', 'create')->name('create');
                    Route::get('/', 'index')->name('index');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::put('/edit', 'update')->name('update');
                    Route::post('/add', 'store')->name('store');
                    Route::delete('/delete/{id}', 'delete')->name('delete');
                });
            });
        });


    //user
    Route::prefix('/manager-user')->as('user.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\User\UserController::class)->group(function () {
            Route::get('/add', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/edit', 'update')->name('update');
            Route::post('/add', 'store')->name('store');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });
    });
    //admin
    Route::prefix('/manager-admin')->as('admin.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Admin\AdminController::class)->group(function () {
            Route::get('/add', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/edit', 'update')->name('update');
            Route::post('/add', 'store')->name('store');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });
    });

    //Settings
    Route::controller(App\Admin\Http\Controllers\Setting\SettingController::class)
        ->prefix('/settings')
        ->as('setting.')
        ->group(function () {
            Route::get('/general', 'general')->name('general');
            Route::put('/update', 'update')->name('update');
        });

    //ckfinder
    Route::prefix('/quan-ly-file')->as('ckfinder.')->group(function () {
        Route::any('/connect', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
            ->name('connector');
        Route::any('/duyet', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
            ->name('browser');
    });
    Route::get('/dashboard', [App\Admin\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    //auth
    Route::controller(App\Admin\Http\Controllers\Auth\ProfileController::class)
        ->prefix('/profile')
        ->as('profile.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/', 'update')->name('update');
        });

    Route::controller(App\Admin\Http\Controllers\Auth\ChangePasswordController::class)
        ->prefix('/password')
        ->as('password.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/', 'update')->name('update');
        });

    Route::prefix('/search')->as('search.')->group(function () {
        Route::prefix('/select')->as('select.')->group(function () {
            Route::get('/tag', [App\Admin\Http\Controllers\Blog\Tag\TagSearchSelectController::class, 'selectSearch'])->name('tag');
            Route::get('/category', [App\Admin\Http\Controllers\Blog\Category\CategorySearchSelectController::class, 'selectSearch'])->name('category');
            Route::get('/user', [App\Admin\Http\Controllers\User\UserSearchSelectController::class, 'selectSearch'])->name('user');
            Route::get('/admin', [App\Admin\Http\Controllers\Admin\AdminSearchSelectController::class, 'selectSearch'])->name('admin');
        });
    });

    Route::post('/logout', [App\Admin\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
});
