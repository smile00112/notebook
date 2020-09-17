<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function index()
    // {
    //     $data = [];
    //     $data['title'] = 'Федеральная сеть салонов по ремонту техники';
    //     return view('main', $data);
    // }

    // public function indexCity($city)
    // {
    //     $data = [];
    //     $data['title'] = "Ремонт в {$city} тел ...".config('app.phone').'___';
    //     return view('main', $data);
    // }

}
