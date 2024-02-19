<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected $services = [
        'App\Admin\Services\Admin\AdminServiceInterface' => 'App\Admin\Services\Admin\AdminService',
        'App\Admin\Services\User\UserServiceInterface' => 'App\Admin\Services\User\UserService',
        'App\Admin\Services\Blog\Category\CategoryServiceInterface' => 'App\Admin\Services\Blog\Category\CategoryService',
        'App\Admin\Services\Blog\Post\PostServiceInterface' => 'App\Admin\Services\Blog\Post\PostService',
        'App\Admin\Services\Slider\SliderServiceInterface' => 'App\Admin\Services\Slider\SliderService',
        'App\Admin\Services\Slider\SliderItemServiceInterface' => 'App\Admin\Services\Slider\SliderItemService',
        'App\Admin\Services\Page\PageServiceInterface' => 'App\Admin\Services\Page\PageService',
        'App\Admin\Services\Blog\Tag\TagServiceInterface' => 'App\Admin\Services\Blog\Tag\TagService',
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->services as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
