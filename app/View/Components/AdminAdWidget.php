<?php

namespace App\View\Components;

use App\Models\Ad;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminAdWidget extends Component
{
    public string $bgClass = 'success';
    public int $countInfo = 0;
    public string $title;
    public string $link;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->title = __('admin.active_ads_today');
        $this->link = route('admin.ads.index', ['sort' => 'new', 'activity' => 'active']);
        $this->countInfo = Ad::select('id')->active()->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string|null
    {
        if (Auth::user()?->hasAnyRole(['Admin', 'Chief-editor'])) {
            return view('components.admin-widget-card');
        }

        return null;
    }
}
