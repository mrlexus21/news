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
    private NewsPostRepositoryInterface $newsRepository;

    public function __construct(NewsPostRepositoryInterface $newsRepository,)
    {
        $this->newsRepository = $newsRepository;
    }
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $posts = Post::inRandomOrder()->with('category')->limit(5)->get();
        $lastPosts = Post::orderBy('published_at', 'desc')->limit(10)->get();
        $mainPost = $lastPosts->take(1)->first();

        return view('index', compact('posts', 'lastPosts', 'mainPost'));
    }

    public function category(Category $category)
    {
        $categoryNews = $this->newsRepository->getLastNewsByCategoryId($category->id);
        $categoryNewsPaginate = $this->newsRepository->getLastNewsWithPaginateByCategoryId($category->id, 5);
        return view('category', compact('category','categoryNews', 'categoryNewsPaginate'));
    }

    public function newsPost(Category $category, Post $post)
    {
        return view('newspost', compact('post'));
    }
}
