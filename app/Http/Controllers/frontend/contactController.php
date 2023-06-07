<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\pageelements;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use Session;

class contactController extends Controller
{
    public function index()
    {
        $contacts=pageelements::where('row_type','contact_footer')->first();
        return view('frontend.pages.contact.index',compact("contacts"));
    }
    
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ]);
        
        $item=$request->all();
        
        $adminEmail = env('CONTACT_US_EMAIL');
        //$adminEmail = "rakibuzzman72@gmail.com";
        Mail::to($adminEmail)->send(new ContactMail($item));
 
        Session::flash('success', 'Thank you for contact us. we will contact you shortly.');
        return redirect()->back();
    }
    
}
