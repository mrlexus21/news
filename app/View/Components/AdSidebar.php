<?php

namespace App\View\Components;

use App\Models\Ad;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class AdSidebar extends Component
{
    public ?Ad $adSidebar;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->adSidebar = Cache::tags('sidebarad')
            ->remember(serialize([__METHOD__, self::class]),
                config('cache.ad_cache_time') ?? 30,
                function () {
                    return Ad::select('id', 'name', 'link', 'image')
                        ->active()
                        ->type('side')
                        ->inRandomOrder()
                        ->first();
                });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ad-sidebar');
    }
}
