<?php

namespace DeskFlix\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\DeskFlix\Repositories\UserRepository::class, \DeskFlix\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\DeskFlix\Repositories\CategoryRepository::class, \DeskFlix\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\DeskFlix\Repositories\SerieRepository::class, \DeskFlix\Repositories\SerieRepositoryEloquent::class);
        $this->app->bind(\DeskFlix\Repositories\VideoRepository::class, \DeskFlix\Repositories\VideoRepositoryEloquent::class);
        $this->app->bind(\DeskFlix\Repositories\PlanRepository::class, \DeskFlix\Repositories\PlanRepositoryEloquent::class);
        $this->app->bind(\DeskFlix\Repositories\OrderRepository::class, \DeskFlix\Repositories\OrderRepositoryEloquent::class);
        $this->app->bind(\DeskFlix\Repositories\SubscriptionRepository::class, \DeskFlix\Repositories\SubscriptionRepositoryEloquent::class);
        //:end-bindings:
    }
}
