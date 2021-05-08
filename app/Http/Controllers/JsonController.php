<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JsonController extends Controller
{
    public function index(){
        $posts=Http::get('https://api.covid19api.com/live/country/mongolia/status/confirmed')->json();
        $collection=collect($posts);
        //dd($collection);
        return view('mongolia',['collection'=>$collection]);
    }
}