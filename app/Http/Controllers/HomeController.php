<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    
    public function index()
    {
        $data = [];
        $data['title'] = 'Федеральная сеть салонов по ремонту техники';
        return view('main', $data);
    }

    public function indexCity($city)
    {
        $data = [];
        $data['title'] = "Ремонт в {$city} тел ...".config('app.phone').'___';
        return view('main', $data);
    }

}
