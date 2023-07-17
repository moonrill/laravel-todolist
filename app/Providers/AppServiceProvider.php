<?php

namespace App\Providers;

use App\Services\Impl\TodolistServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\TodolistService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $singletons = [
        UserService::class => UserServiceImpl::class,
        TodolistService::class => TodolistServiceImpl::class
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
