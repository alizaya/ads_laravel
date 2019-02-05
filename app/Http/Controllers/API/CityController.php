<?php

namespace App\Http\Controllers\API;

use App\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;

class CityController extends Controller
{
    public function index()
    {

        return Province::all() ;
    }


}
