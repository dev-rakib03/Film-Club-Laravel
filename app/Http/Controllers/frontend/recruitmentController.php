<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\applicant;
use App\Models\pageelements;
use PDF;

class recruitmentController extends Controller
{
    public function index()
    {
        $app_status = pageelements::where('row_type','recruitment_status')->first();
        if($app_status->status==1){
          return view('frontend.pages.recruitment.index');  
        }
        else{
            return view('frontend.pages.recruitment.closed');
        }
    }
    
    public function postApplication(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'aiub_id' => 'required|unique:applicants|string|min:10|max:10|aiub_id_check',
            'department' => 'required',
            'semester' => 'required|integer',
            'cgpa' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'gender' => 'required',
            'blood_group' => 'required',
            'address' => 'required',
            'phone' => 'required|digits_between:11,11',
            'email' => 'required|email|unique:applicants',
            'categories' => 'required',
            'hobby' => 'required|string|max:100',
        ],
        [
            'aiub_id.aiub_id_check' => 'Please input valid AIUB ID (00-00000-0)',
            'phone.digits_between' => 'The phone must be 11 digits(01000000000).'
        ]);
        
        
        //dd($request->categories);

        
        $applicants = new applicant();
        $applicants->name = $request->name;
        $applicants->aiub_id = $request->aiub_id;
        $applicants->department = $request->department;
        $applicants->blood_group = $request->blood_group;
        $applicants->email = $request->email;
        $applicants->phone = $request->phone;
        $applicants->categories = json_encode($request->categories, JSON_FORCE_OBJECT);
        $applicants->hobby = $request->hobby;
        $applicants->semester = $request->semester;
        $applicants->cgpa = $request->cgpa;
        $applicants->gender = $request->gender;
        $applicants->address = $request->address;
        //$applicants->created_at = $request->created_at;
        $applicants->save();
        
        
        
        return redirect()->route('apply.success',$applicants->id);
    }
    
    public function postApplicationsuccess($id)
    {
        //$app_status = pageelements::where('row_type','recruitment_status')->first();
        //if($app_status->status==1){
            $applicant = applicant::find($id);
            if($applicant){
                return view('frontend.pages.recruitment.success',compact('applicant'));
            }
            else{
                return redirect('/apply');
            }
        // }
        // else{
        //     return redirect('/apply');
        // }
    }
    
    public function downloadApplicationsuccess($id)
    {
        //$app_status = pageelements::where('row_type','recruitment_status')->first();
        //if($app_status->status==1){
            $applicant = applicant::find($id);
            if($applicant){
                
                //return view('frontend.pages.recruitment.pdf',compact('applicant'));
                
                //pdf  
                $pdf = PDF::loadView('frontend.pages.recruitment.pdf',compact('applicant'));
                $pdf->set_paper("A4", "portrait");
                return $pdf->download("AFC-recruitment-Application-ID-".$id.".pdf");
                //return $pdf->stream("AFC-recruitment-Application-ID-".$id.".pdf");
            }
            else{
                return redirect('/apply');
            }
        // }
        // else{
        //     return redirect('/apply');
        // }
    }
    
    public function alrady_applied()
    {
        //$app_status = pageelements::where('row_type','recruitment_status')->first();
        //if($app_status->status==1){
            return view('frontend.pages.recruitment.find');
        // }
        // else{
        //     return redirect('/apply');
        // }
    }
    
    public function alrady_applied_post(Request $request)
    {
        // $app_status = pageelements::where('row_type','recruitment_status')->first();
        // if($app_status->status==1){
            $request->validate([
                'aiub_id' => 'required',
            ]);
            $applicant = applicant::where('aiub_id',$request->aiub_id)->first();
            if($applicant){
                return redirect()->route('apply.success',$applicant->id);
            }
            else{
                return redirect('/apply');
            }
        // }
        // else{
        //     return redirect('/apply');
        // }
    }
    
}
