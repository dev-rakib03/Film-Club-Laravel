<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class galleryController extends Controller
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
        if (is_null($this->user) || !$this->user->can('pages.gallery')) {
            return redirect()->route('admin.login');
        }

        //page action
        $gallery=gallery::all()->SortByDesc('created_at');
        return view('backend.pages.gallery.index',compact('gallery'));
    }

    public function store(Request $request)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.gallery')) {
            return redirect()->route('admin.login');
        }

        //page action


        $gallery = new gallery();
        $gallery->title=$request->title;
        $gallery->image=$request->image_link;
        $gallery->save();
        session()->flash('success','Image has been added!');
        return back();
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.gallery')) {
            return redirect()->route('admin.login');
        }
        //page action
        $gallery=gallery::find($id);;

        if (!is_null($gallery)) {
            $gallery->delete();
        }
        session()->flash('success','Image has been deleted!');
        return back();
    }
}
