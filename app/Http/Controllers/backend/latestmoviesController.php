<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\latest_film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class latestmoviesController extends Controller
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
        if (is_null($this->user) || !$this->user->can('pages.latest_movies')) {
            return redirect()->route('admin.login');
        }

        //page action
        $latest_films=latest_film::all()->SortByDesc('created_at');
        return view('backend.pages.latestmovies.index',compact('latest_films'));
    }

    public function store(Request $request)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.latest_movies')) {
            return redirect()->route('admin.login');
        }

        //page action
        $request->validate([
            'image' => 'required|max:1024|dimensions:width=270,height=330',
        ]);
        //image upload
        $image=$request->image;
        // create new file name.
        $imageName = md5(rand() * time()).".".$image->getClientOriginalExtension();
        $uploadPath = 'frontend/img/home-pro/upcoming/';
        $image->move("public/".$uploadPath,$imageName);
        $banner_image=$uploadPath.$imageName;

        $latest_film = new latest_film();
        $latest_film->name=$request->name;
        $latest_film->image=$banner_image;
        $latest_film->type=$request->type;
        $latest_film->relese_date=$request->relese_date;
        $latest_film->video_link=$request->video_link;
        $latest_film->status=$request->status;
        $latest_film->save();
        session()->flash('success','Movie has been added!');
        return back();
    }

    public function edit($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.latest_movies')) {
            return redirect()->route('admin.login');
        }

        //page action
        $latest_film=latest_film::find($id);
        return view('backend.pages.latestmovies.edit',compact('latest_film'));
    }

    public function update(Request $request, $id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.latest_movies')) {
            return redirect()->route('admin.login');
        }
        $latest_film = latest_film::find($id);

        if($request->image){
            //page action
            $request->validate([
                'image' => 'required|max:1024|dimensions:width=270,height=330',
            ]);
            //image upload
            $image=$request->image;
            // create new file name.
            $imageName = md5(rand() * time()).".".$image->getClientOriginalExtension();
            $uploadPath = 'frontend/img/home-pro/upcoming/';
            $image->move("public/".$uploadPath,$imageName);
            if(file_exists(public_path($latest_film->image))){
                unlink(public_path($latest_film->image));
            }
            $banner_image=$uploadPath.$imageName;
            $latest_film->image=$banner_image;
        }
        $latest_film->name=$request->name;
        $latest_film->type=$request->type;
        $latest_film->relese_date=$request->relese_date;
        $latest_film->video_link=$request->video_link;
        $latest_film->status=$request->status;
        $latest_film->save();
        session()->flash('success','Movie has been updated!');
        return redirect()->route('admin.pages.latest_movies.index');
    }

    public function destroy($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.latest_movies')) {
            return redirect()->route('admin.login');
        }
        //page action
        $latest_movie=latest_film::find($id);;

        if (!is_null($latest_movie)) {
            if(file_exists(public_path($latest_movie->image))){
                unlink(public_path($latest_movie->image));
            }
            $latest_movie->delete();
        }
        session()->flash('success','Movie has been deleted!');
        return back();
    }
}
