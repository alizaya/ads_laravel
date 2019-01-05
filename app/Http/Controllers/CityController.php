<?php

namespace App\Http\Controllers;

use App\City;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CityController extends Controller
{
    public function index()
    {
        $province=Province::all();

        return view('city.cityindex',compact('province'));
    }

    public function store($city)
    {

        return redirect()->route('index')->withCookie(cookie('province',$city,30*24*60));
    }
}
