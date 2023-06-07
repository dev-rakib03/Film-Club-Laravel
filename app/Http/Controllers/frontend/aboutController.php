<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\member;
use App\Models\pageelements;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function index()
    {
        $about_us=pageelements::where('row_type','about_us')->where('status',1)->get();
        $projects=pageelements::where('row_type','projects')->first();
        $executives=pageelements::where('row_type','executive')->where('status',1)->get();
        $total_members=member::where('leave_date', null)->count();
        return view('frontend.pages.about.index',compact("about_us","projects","executives","total_members"));
    }
}
