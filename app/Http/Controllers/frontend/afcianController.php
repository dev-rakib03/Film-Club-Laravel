<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\member;
use Illuminate\Http\Request;

class afcianController extends Controller
{
    public function index(Request $request)
    {
        if($request->search){
            $members=member::where('aiub_id', $request->search)->paginate(30);
        }
        else{
            $member = member::where('designation', 'Member');
            $jrexecutive = member::where('designation', 'Junior Executive');
            $members = member::where('designation', 'Executive')->union($jrexecutive)->union($member)->paginate(32);
        }
        
        return view('frontend.pages.afcian.index',compact("members"));
    }
}
