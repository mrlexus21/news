<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\Interfaces\NewsPostRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function category(Category $category)
    {
        return view('category', compact('category'));
    }

    public function newsPost(Category $category, Post $post)
    {
        return view('newspost', compact('post'));
    }
}
