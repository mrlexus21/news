<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function index()
    {
        return view('personal');
    }

    public function subscribeList()
    {
        return view('personal.subscribes');
    }
}
