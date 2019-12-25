<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\TaskPolicy;
use App\Task;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //
    }

    protected $policies = [
        Task::class => TaskPolicy::class,
    ];
}
