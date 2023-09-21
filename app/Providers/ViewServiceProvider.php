<?php

namespace App\Providers;

use App\Http\ViewComposers\CategoriesComposer;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        View::composer(['layouts.master'], CategoriesComposer::class);

        View::composer(['layouts.master'], function($view) {
            $personalRoute = 'login';

            if(Auth::user()?->hasAnyRole(['Admin','Chief-editor', 'Editor'])) {
                $personalRoute = 'admin.dashboard';
            } elseif(Auth::check()) {
                $personalRoute = 'personal.index';
            }

            $view->with(['personalRoute' => $personalRoute]);
        });
    }
}
