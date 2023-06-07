<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class afcianController extends Controller
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
        if (is_null($this->user) || !$this->user->can('pages.afcian')) {
            return redirect()->route('admin.login');
        }

        //page action

        $members = member::all()->SortBy('joining_date');
        return view('backend.pages.afcian.index',compact('members'));
    }

    public function store(Request $request)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.afcian')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'aiub_id' => 'required|unique:members',
        ]);

        //page action
        // Validation Data
        $request->validate([
            'image' => 'required|max:512|dimensions:width=270,height=330',
        ]);
        //image upload
        $image=$request->image;
        // create new file name.
        $imageName = md5(rand() * time()).".".$image->getClientOriginalExtension();
        $uploadPath = 'frontend/img/home-one/team/';
        $image->move("public/".$uploadPath,$imageName);


        $member = new member();
        $member->name=$request->name;
        $member->aiub_id=$request->aiub_id;
        $member->email=$request->email;
        $member->facebook=$request->facebook;
        $member->designation=$request->designation;
        $member->joining_date=$request->joining_date;
        $member->image=$uploadPath.$imageName;
        $member->save();
        session()->flash('success','Member has been added!');
        return back();
    }

    public function edit($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.afcian')) {
            return redirect()->route('admin.login');
        }

        //page action
        $member=member::find($id);
        return view('backend.pages.afcian.edit',compact('member'));

    }

    public function update(Request $request, $id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.afcian')) {
            return redirect()->route('admin.login');
        }

        //page action
        $member=member::find($id);
        if($request->image){
            //add about us
            // Validation Data
            $request->validate([
                'image' => 'required|max:1024|dimensions:width=270,height=330',
            ]);
            //image upload
            $image=$request->image;
            // create new file name.
            $imageName = md5(rand() * time()).".".$image->getClientOriginalExtension();
            $uploadPath = 'frontend/img/home-one/team/';
            $image->move("public/".$uploadPath,$imageName);
            if(file_exists(public_path($member->image))){
                unlink(public_path($member->image));
            }
            $member->image=$uploadPath.$imageName;
        }

        $member->name=$request->name;
        $member->aiub_id=$request->aiub_id;
        $member->email=$request->email;
        $member->facebook=$request->facebook;
        $member->designation=$request->designation;
        $member->joining_date=$request->joining_date;
        $member->leave_date=$request->leave_date;
        $member->save();
        session()->flash('success','Member has been updated!');
        return redirect()->route('admin.pages.afcian.index');
    }

    public function destroy($id)
    {
        //authorize user
        if (is_null($this->user) || !$this->user->can('pages.afcian')) {
            return redirect()->route('admin.login');
        }

        //page action
        $member=member::find($id);;
        if (!is_null($member)) {
            if(file_exists(public_path($member->image))){
                unlink(public_path($member->image));
            }
            $member->delete();
        }

        session()->flash('success','Member has been deleted!');
        return back();
    }
}
