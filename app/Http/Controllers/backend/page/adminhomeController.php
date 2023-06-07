<?php

namespace App\Http\Controllers\backend\page;

use App\Http\Controllers\Controller;
use App\Models\home_slider;
use App\Models\pageelements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminhomeController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.home')) {
            return redirect()->route('admin.login');
        }

        //page action
        $home_sliders=home_slider::all();
        return view('backend.pages.home.home',compact('home_sliders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.home')) {
            return redirect()->route('admin.login');
        }

        //page action
        //image
            // Validation Data
            $request->validate([
                'image' => 'required|max:1024',
            ]);
            //image upload
            $slider_image=$request->image;
            // create new file name.
            $imageName = md5(rand() * time()).".".$slider_image->getClientOriginalExtension();
            $uploadPath = 'frontend/img/home-sliders/';
            $slider_image->move("public/".$uploadPath,$imageName);

        //database
        $data= new home_slider();
        $data->text=$request->text;
        $data->image=$uploadPath.$imageName;
        $data->btn_text=$request->btn_text;
        $data->btn_link=$request->btn_link;
        $data->play_btn_link=$request->play_btn_link;
        $data->save();
        session()->flash('success','Slider has been added!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.home')) {
            return redirect()->route('admin.login');
        }

        //page action
        $home_sliders=home_slider::where('id',$id)->first();
        return view('backend.pages.home.edit',compact('home_sliders'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.home')) {
            return redirect()->route('admin.login');
        }

        //page action
        if($request->image){
            $home_slider = home_slider::where('id',$id)->first();
            if (!is_null($home_slider)) {
                if(file_exists(public_path($home_slider->image))){
                    unlink(public_path($home_slider->image));
                }
            }

            //image
            // Validation Data
            $request->validate([
                'image' => 'required|max:1024',
            ]);
            //image upload
            $slider_image=$request->image;
            // create new file name.
            $imageName = md5(rand() * time()).".".$slider_image->getClientOriginalExtension();
            $uploadPath = 'frontend/img/home-sliders/';
            $slider_image->move("public/".$uploadPath,$imageName);
        }


        //database
        $data=home_slider::find($id);
        $data->text=$request->text;
        if($request->image){
            $data->image=$uploadPath.$imageName;
        }
        $data->btn_text=$request->btn_text;
        $data->btn_link=$request->btn_link;
        $data->play_btn_link=$request->play_btn_link;
        $data->save();

        session()->flash('success','Slider has been updated!');
        return redirect()->route('admin.pages.home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.home')) {
            return redirect()->route('admin.login');
        }

        //page action
        $home_slider = home_slider::where('id',$id)->first();

        if (!is_null($home_slider)) {
            if(file_exists(public_path($home_slider->image))){
                unlink(public_path($home_slider->image));
            }

            $home_slider->delete();
        }

        session()->flash('success','Slider has been deleted!');
        return back();
    }


}
