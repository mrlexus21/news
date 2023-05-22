<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\NewsPostRepositoryInterface;
use App\Repositories\NewsPostRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /*public $bindings = [
        NewsPostRepositoryInterface::class => NewsPostRepositoryInterface::class,
        NewsPostRepository::class => NewsPostRepository::class
    ];*/

    public function register(): void
    {
        $this->app->bind(
            NewsPostRepositoryInterface::class,
            NewsPostRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
    }

    public function boot(): void
    {

    }
}
