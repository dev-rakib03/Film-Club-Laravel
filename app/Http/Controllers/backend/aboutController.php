<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\pageelements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class aboutController extends Controller
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
        if (is_null($this->user) || !$this->user->can('pages.about')) {
            return redirect()->route('admin.login');
        }

        //page action
        $abouts = pageelements::where('row_type','about_us')->get();
        $about_footer = pageelements::where('row_type','about_footer')->first();
        $projects=pageelements::where('row_type','projects')->first();
        $executives = pageelements::where('row_type','executive')->get();
        return view('backend.pages.about.index',compact('abouts','about_footer','executives','projects'));
    }

    public function store(Request $request)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.about')) {
            return redirect()->route('admin.login');
        }

        //page action

        if($request->about_type=="about_us"){
            //add about us
            // Validation Data
            $request->validate([
                'title' => 'required',
                'body' => 'required',
                'image' => 'required|max:1024',
            ]);
            //image upload
            $about_image=$request->image;
            // create new file name.
            $imageName = md5(rand() * time()).".".$about_image->getClientOriginalExtension();
            $uploadPath = 'frontend/img/home-pro/about/';
            $about_image->move("public/".$uploadPath,$imageName);
            
            $s=str_replace(array("\r\n","\n"),"\\n",$request->body);
            $about_json='{"title":"'.$request->title.'","body":"'.str_replace('"','`',$s).'","image":"'.$uploadPath.$imageName.'"}';
            $about_type="about_us";
        }

        $about = new pageelements();
        $about->row_type=$about_type;
        $about->link_or_text=$about_json;
        $about->save();
        session()->flash('success','About has been updated!');
        return back();
    }

    public function edit($id)
    {
        $about=pageelements::find($id);

        if($about->row_type=="about_us"){
            return view('backend.pages.about.edit',compact('about'));
        }
        else if($about->row_type=="executive"){
            return view('backend.pages.about.edit_executive',compact('about'));
        }
    }

    public function update(Request $request, $id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.about')) {
            return redirect()->route('admin.login');
        }

        //page action
        $about=pageelements::find($id);
        $about_json=json_decode($about->link_or_text);

        if($request->about_type=="about_us"){

            if($request->image){
                //add about us
                // Validation Data
                $request->validate([
                    'image' => 'required|max:1024',
                ]);
                //image upload
                $about_image=$request->image;
                // create new file name.
                $imageName = md5(rand() * time()).".".$about_image->getClientOriginalExtension();
                $uploadPath = 'frontend/img/home-pro/about/';
                $about_image->move("public/".$uploadPath,$imageName);
                $image_name=$uploadPath.$imageName;
                if(file_exists(public_path($about_json->image))){
                    unlink(public_path($about_json->image));
                }
            }
            else{
                $image_name=$about_json->image;
            }
            
            
            $s=str_replace(array("\r\n","\n"),"\\n",$request->body);
            $about_json='{"title":"'.$request->title.'","body":"'.str_replace('"','`',$s).'","image":"'.$image_name.'"}';
            $about_type="about_us";
        }
        else if($request->about_type=="projects"){
            $about_json='{"awards":"'.$request->awards.'","complete_works":"'.$request->complete_works.'"}';
            $about_type="projects";
        }
        else if($request->about_type=="executive"){

            if($request->image){
                //add about us
                // Validation Data
                $request->validate([
                    'image' => 'required|max:1024|dimensions:width=415,height=450',
                ]);
                //image upload
                $about_image=$request->image;
                // create new file name.
                $imageName = md5(rand() * time()).".".$about_image->getClientOriginalExtension();
                $uploadPath = 'frontend/img/home-one/team/';
                $about_image->move("public/".$uploadPath,$imageName);
                $image_name=$uploadPath.$imageName;
                if(file_exists(public_path($about_json->image))){
                    unlink(public_path($about_json->image));
                }
            }
            else{
                $image_name=$about_json->image;
            }
            $s=str_replace(array("\r\n","\n"),"\\n",$request->spech);
            
           // echo $s;
            $about_json='{"name":"'.$request->name.'","title":"'.$request->title.'","email":"'.$request->email.'","image":"'.$image_name.'","spech":"'.$s.'"}';
            $about_type="executive";
        }
        else if($request->about_type=="about_footer"){
            $about_json='{"body":"'.$request->body.'"}';
            $about_type="about_footer";
        }

        $about = pageelements::find($id);
        $about->row_type=$about_type;
        $about->link_or_text=$about_json;
        $about->save();
        session()->flash('success','About has been updated!');
        return redirect()->route('admin.pages.about.index');
    }

    public function destroy($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.about')) {
            return redirect()->route('admin.login');
        }

        //page action
        $about=pageelements::find($id);;
        $about_json=json_decode($about->link_or_text);
        if (!is_null($about)) {
            if(file_exists(public_path($about_json->image))){
                unlink(public_path($about_json->image));
            }

            $about->delete();
        }

        session()->flash('success','About has been deleted!');
        return back();
    }
}
