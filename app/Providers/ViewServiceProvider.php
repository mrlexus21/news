<?php

namespace App\Providers;

use App\Http\ViewComposers\CategoriesComposer;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        View::composer(['layouts.master'], CategoriesComposer::class);
    }
}
