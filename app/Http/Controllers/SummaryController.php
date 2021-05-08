<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use App\Models\Summary;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index(){
        $posts=Http::get('https://api.covid19api.com/summary')->json();
        $collection=collect($posts);
        $collection1 = $collection['Global'];
        $collection2 = $collection['Countries'];
        //dd($collection);
        return view('world', compact('collection1', 'collection2'));
    }
}
