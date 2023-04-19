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
        dd(User::inRandomOrder()->first());
    }
}
