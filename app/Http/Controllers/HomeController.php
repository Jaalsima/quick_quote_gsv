<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {

        return view('welcome');
    }

    public function help()
    {
        return view('help');
    }

    public function services()
    {
        return view('services');
    }

    public function manual()
    {
        return view('manual');
    }

    public function settings()
    {
        return view('settings');
    }

    public function policy()
    {
        return view('policy');
    }

    public function terms()
    {
        return view('terms');
    }
}
