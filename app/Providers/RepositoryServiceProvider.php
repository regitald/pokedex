<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Interfaces\TypeRepositoryInterface;
use App\Repositories\TypeRepository;
use App\Interfaces\PowerRepositoryInterface;
use App\Repositories\PowerRepository;
use App\Interfaces\SpecificationRepositoryInterface;
use App\Repositories\SpecificationRepository;
use App\Interfaces\MonsterRepositoryInterface;
use App\Repositories\MonsterRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            TypeRepositoryInterface::class,
            TypeRepository::class
        );
        $this->app->bind(
            PowerRepositoryInterface::class,
            PowerRepository::class
        );
        $this->app->bind(
            SpecificationRepositoryInterface::class,
            SpecificationRepository::class
        );
        $this->app->bind(
            MonsterRepositoryInterface::class,
            MonsterRepository::class
        );
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
