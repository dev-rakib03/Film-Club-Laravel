<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\gallery;
use Illuminate\Http\Request;

class galleryController extends Controller
{
    public function index()
    {
        $gallery=gallery::orderBy('created_at', 'DESC')->paginate(30);
        return view('frontend.pages.gallery.index',compact("gallery"));
    }
}
