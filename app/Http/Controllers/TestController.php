<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function welcome_fn()
    {
        return view('welcome');
    }
    public function insidePage_fn()
    {
        return view('profile/insidePage');
    }
    public function profileInf_fn()
    {
        return view('profile/profileInf');
    }
}
