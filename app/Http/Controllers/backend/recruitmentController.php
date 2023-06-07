<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\applicant;
use Illuminate\Http\Request;
use App\Models\pageelements;
use Mail;
use App\Mail\ApplyMail;
class recruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['all_applicant']=applicant::orderBy('id', 'ASC')->get();;
        return view('backend.pages.recruitment.index',$result);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function settings()
    {
        $result['app_status'] = pageelements::where('row_type','recruitment_status')->first();
        return view('backend.pages.recruitment.settings',$result);
    }
    
    public function application_form_btn($status)
    {
        pageelements::where('row_type','recruitment_status')
        ->update(['status' => $status]);
        
        session()->flash('success','Application Form status has been updated!');
        return redirect()->back();
    }
    
    public function deleteApplicationsuccess()
    {
        applicant::truncate();
        return redirect()->back();
    }
    
    public function sendEmailToAllApplicent()
    {
        return view('backend.pages.recruitment.email');
        //return view('emails.apply',$result); 
    }
    
    public function sendEmailToAllApplicentpost(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);
        $result['subject']=$request->subject;
        $result['body']=$request->body;
        
        $applicant=applicant::all();
        
        foreach($applicant as $appli){
            
            $adminEmail = $appli->email;
            Mail::to($adminEmail)->send(new ApplyMail($result));
            
        }
        
        //    Mail::to("rakibuzzman72@gmail.com")->send(new ApplyMail($result));
        
        
        
        session()->flash('success','Email sended to all the applicant!');
        return redirect()->route('admin.recruitment.index');
    }
}
