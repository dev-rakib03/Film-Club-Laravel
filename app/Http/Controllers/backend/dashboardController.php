<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\member;
use App\Models\offer;
use App\Models\order;
use App\Models\pageelements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
                    $this->user = Auth::guard('admin')->user();
                    return $next($request);
                });

    }
    public function index()
    {
        if (is_null($this->user)) {
            return redirect()->route('admin.login');
        }

        $projects=pageelements::where('row_type','projects')->first();
        $total_members=member::where('leave_date', null)->count();
        return view('backend.dashboard.dashboard',compact('projects','total_members'));
    }
}
