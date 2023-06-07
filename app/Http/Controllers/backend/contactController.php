<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\pageelements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class contactController extends Controller
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
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.contact')) {
            return redirect()->route('admin.login');
        }

        //page action
        $contact = pageelements::where('row_type','contact_footer')->first();
        return view('backend.pages.contact.index',compact('contact'));
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.contact')) {
            return redirect()->route('admin.login');
        }

        //page action
        $about=pageelements::find($id);
        $about_json=json_decode($about->link_or_text);



        $about_json='{"address":"'.$request->address.'","phone":"'.$request->phone.'","email":"'.$request->email.'"}';

        $about = pageelements::find($id);
        $about->link_or_text=$about_json;
        $about->save();
        session()->flash('success','Contact has been updated!');
        return redirect()->route('admin.pages.contact.index');
    }

    public function destroy($id)
    {

    }
}
