<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\home_slider;
use App\Models\latest_film;
use App\Models\notice;
use App\Models\social;
use App\Models\operator;
use App\Models\pageelements;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $socials=social::all();
        $sliders=home_slider::get();
        $about_us=pageelements::where('row_type','about_us')->where('status',1)->get();
        $latest_film=latest_film::where('status',1)->orderBy('relese_date', 'DESC')->get();
        $latest_news=notice::orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.home.index',compact("sliders","socials","about_us","latest_film","latest_news"));
    }
}
