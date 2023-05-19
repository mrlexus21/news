<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Repositories\NewsPostRepository;
use App\Services\NewsPost\NewsPostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TestController extends Controller
{
    //
    public function __invoke()
    {
        dd(storage_path('app/public/images'));
        //$npr = new NewsPostRepository();
        //dd($npr->getAllWithPaginate(10));
        //dd( User::factory()->create());
        //dd(Category::find(16)->description);
        //dd(response(true, 403));
        //$user = User::find(2);
        //dd($user->hasAnyRole(['Chief-editor']));
        //$role = Role::find(1)->users()->get();
        //dd($role);
        //$post = Post::orderBy('published_at', 'desc')->limit(10);
        //dd($post);
        //dump($post->getMiddleFormatDateAttribute());
        //dump($post->getMiddleShortMonthFormatDateAttribute());
        //dump($post->getFullShortTimeFormatDateAttribute());
    }
}
