<?php

namespace App\Providers;

use App\Repositories\CategoryCachedRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\PostCachedRepository;
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
            PostRepositoryInterface::class,
            PostCachedRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryCachedRepository::class
        );
    }

    public function boot(): void
    {

    }
}
