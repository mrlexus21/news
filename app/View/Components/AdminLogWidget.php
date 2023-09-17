<?php

namespace App\View\Components;

use App\Models\Log;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminLogWidget extends Component
{
    public string $bgClass = 'danger';
    public int $countInfo = 0;
    public string $title;
    public string $link;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->title = __('admin.new_log_records');
        $this->link = route('admin.logs.index');
        $this->countInfo = Log::select('id')
            ->where('unix_time', '>=', Carbon::now()->today()->timestamp)
            ->count();
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
