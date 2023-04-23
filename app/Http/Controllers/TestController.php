<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function __invoke()
    {
        $post = Post::orderBy('published_at', 'desc')->limit(10);
        dd($post);
        //dump($post->getMiddleFormatDateAttribute());
        //dump($post->getMiddleShortMonthFormatDateAttribute());
        //dump($post->getFullShortTimeFormatDateAttribute());
    }
}
