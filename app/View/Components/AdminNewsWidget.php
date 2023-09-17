<?php

namespace App\View\Components;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminNewsWidget extends Component
{
    public string $bgClass = 'success';
    public int $countInfo = 0;
    public string $title;
    public string $link;

    /**
     * Create a new component instance.
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->title = __('admin.new_posts_today');
        $this->link = route('admin.posts.index', ['sort' => 'new']);
        $this->countInfo = $postRepository
            ->getPublishedNewsOverPeriod(Carbon::today(), 999, null, true)
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
