<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::inRandomOrder()->with('category')->limit(5)->get();
        $lastPosts = Post::orderBy('published_at', 'desc')->limit(10)->get();
        $mainPost = $lastPosts->take(1)->first();

        return view('index', compact('categories', 'posts', 'lastPosts', 'mainPost'));
    }

}
