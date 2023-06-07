<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\notice;
use Illuminate\Http\Request;

class noticeController extends Controller
{
    public function index()
    {
        $latest_news=notice::orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.notice.index',compact("latest_news"));
    }
    public function view($slag)
    {
        $latest_news=notice::where('slag',$slag)->first();
        return view('frontend.pages.notice.view',compact('latest_news'));
    }
}
