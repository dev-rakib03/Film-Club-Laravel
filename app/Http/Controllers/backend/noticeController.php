<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class noticeController extends Controller
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
        if (is_null($this->user) || !$this->user->can('pages.notice')) {
            return redirect()->route('admin.login');
        }

        //page action

        $notices = notice::orderBy('created_at', 'DESC')->get();
        return view('backend.pages.notice.index',compact('notices'));
    }

    public function store(Request $request)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.notice')) {
            return redirect()->route('admin.login');
        }

        //page action
        // Validation Data
        $request->validate([
            'image' => 'required|max:1024|dimensions:width=370,height=250',
            'title' => 'required|unique:notices',
        ]);
        
        $slag_nospace = str_replace(str_split('\\/:*?"<>|+-,!#$[]()@%^&+=|{};"".'), '', $request->title);
        $slag_nodot = str_replace('.', '-', $slag_nospace);
        $slag = str_replace(' ', '-', $request->title);
        
        //image upload
        $image=$request->image;
        // create new file name.
        $imageName = md5(rand() * time()).".".$image->getClientOriginalExtension();
        $uploadPath = 'frontend/img/home-pro/news/';
        $image->move("public/".$uploadPath,$imageName);

        $s=str_replace(array("\r\n","\n"),"\n",$request->body);

        $notice = new notice();
        $notice->title=$request->title;
        $notice->image=$uploadPath.$imageName;
        $notice->body=$s;
        $notice->slag=strtolower($slag);
        $notice->save();
        session()->flash('success','Notice has been added!');
        return back();
    }

    public function edit($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.notice')) {
            return redirect()->route('admin.login');
        }

        //page action
        $notice=notice::find($id);
        return view('backend.pages.notice.edit',compact('notice'));

    }

    public function update(Request $request, $id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.notice')) {
            return redirect()->route('admin.login');
        }

        //page action
        $notice=notice::find($id);
        if($request->image){
            //add about us
            // Validation Data
            $request->validate([
                'image' => 'required|max:1024|dimensions:width=370,height=250',
            ]);
            //image upload
            $image=$request->image;
            // create new file name.
            $imageName = md5(rand() * time()).".".$image->getClientOriginalExtension();
            $uploadPath = 'frontend/img/home-pro/news/';
            $image->move("public/".$uploadPath,$imageName);
            if(file_exists(public_path($notice->image))){
                unlink(public_path($notice->image));
            }
            $notice->image=$uploadPath.$imageName;
        }
        
        $s=str_replace(array("\r\n","\n"),"\n",$request->body);
        
        $notice->title=$request->title;
        $notice->body=$s;
        $notice->save();
        session()->flash('success','notice has been updated!');
        return redirect()->route('admin.pages.notice.index');
    }

    public function destroy($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.notice')) {
            return redirect()->route('admin.login');
        }

        //page action
        $notice=notice::find($id);;
        if (!is_null($notice)) {
            if(file_exists(public_path($notice->image))){
                unlink(public_path($notice->image));
            }
            $notice->delete();
        }

        session()->flash('success','Notice has been deleted!');
        return back();
    }
}
