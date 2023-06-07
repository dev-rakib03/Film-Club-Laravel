<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\latest_film;
use Illuminate\Http\Request;

class latestmovieController extends Controller
{
    public function index()
    {
        $latest_film=latest_film::where('status',1)->get();
        return view('frontend.pages.latest_movies.index',compact("latest_film"));
    }
}
