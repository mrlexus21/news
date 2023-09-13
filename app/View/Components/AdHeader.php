<?php

namespace App\View\Components;

use App\Models\Ad;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class AdHeader extends Component
{
    public Ad $adHeader;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->adHeader = Cache::tags('headerad')
            ->remember(serialize([__METHOD__, self::class]),
                config('cache.ad_cache_time') ?? 30,
                function () {
                    return Ad::select('id', 'name', 'link', 'image')
                        ->active()
                        ->type('header')
                        ->inRandomOrder()
                        ->first();
                });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ad-header');
    }
}
