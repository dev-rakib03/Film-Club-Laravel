@php
use App\Models\pageelements;
$contact_footer=pageelements::where('row_type','contact_footer')->first();
@endphp

<!DOCTYPE html>
<html>
    <head>
        <title>MEMBER RECRUITMENT APPLICATION</title>
    </head>
    <body>

                    
 
                    <link rel="stylesheet" href="{{asset('/')}}frontend/css/bootstrap.min.css">
                        <style media="all">
                            html {
                                -webkit-print-color-adjust: exact;
                                -webkit-filter: opacity(1);
                            }

                            @media print {
                                @page {
                                    size: auto;
                                    margin: 0mm 50px;
                                }
                                /* body { margin: 1.6cm; } */
                
                            }
                            @media print {
                                body {
                                    -webkit-print-color-adjust: exact;
                                }
                                /*html {
                                    -webkit-print-color-adjust: exact;
                                    -webkit-filter: opacity(1);
                                }*/
                            }
                            *{
                                 font-family: Arial, Helvetica, sans-serif!important;
                            }
                            
                            .m1{
                                font-weight: bold;
                                background:#fff;
                                font-size:12px;
                                box-shadow: 0px 0px 3px 1px rgba(0, 0, 0)!important;
                                padding-top:3px;
                                padding-bottom:3px;
                                
                            }
                            
                        </style>
                        
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <td style="width:15%;">
                                        <div>
                                            <img src="{{asset('/backend/assets/img/email_logo.png')}}" style="max-hight:40px;width:93px;">
                                        </div>
                                        <br>

                                    </td>
                                    <td class="text-center" style="width:70%;font-weight: bold;font-size:35px;">
                                        <div style="margin-bottom:20px;">AIUB FILM CLUB</div>
                                    </td>
                                    <td  style="width:15%" class="text-right" style="font-size:14px; text-align: right;">
                                        Club Copy
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                                <tr style="background:rgb(0 112 192); margin-top:20px;">
                                    <td colspan="2">
                                        <div class="m1 text-center" style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0)!important; width:170px; margin:10px 0px 2px 35px;">
                                            Member Recruitment Form
                                        </div>
                                    </td>
                                    <td>
                                        <div class="m1 text-center" style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0)!important; width:100px; margin:10px 20px 2px 0px;">
                                            DBAN : {{str_pad($applicant->id, 3, '0', STR_PAD_LEFT)}}
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        
                        <table class="table table-borderless" style="margin-top:-20px;">
                            <tbody>
                                <tr>
                                    <td class="text-left" style="width:60%;font-size:14px; padding:10px 0px;">Applicant's Name : {{$applicant->name}}</td>
                                    <td class="text-left" style="width:40%;font-size:14px; padding:10px 0px;">Department : {{$applicant->department}}</td>
                                </tr>
                                
                                <tr>
                                    <td class="text-left" style="width:60%;font-size:14px; padding:10px 0px;">AIUB ID : {{$applicant->aiub_id}}</td>
                                    <td class="text-left" style="width:40%;font-size:14px; padding:10px 0px;">CGPA : {{$applicant->cgpa}}</td>
                                </tr>
                                
                                <tr>
                                    <td class="text-left" style="width:60%;font-size:14px;">Semester Completed at AIUB : {{$applicant->semester}}</td>
                                    <td class="text-left" style="width:40%;font-size:14px;">Current location : {{$applicant->address}}</td>
                                </tr>
                                
                                <tr>
                                    @php
                                        $categories=json_decode($applicant->categories);
                                    @endphp
                                    <td class="text-left" style="width:60%;font-size:14px;">
                                        Categories Selected :
                                        <ul style="margin-top:5px;">
                                            @foreach($categories as $cat)
                                            <li style="font-weight: bold;">{{$cat}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-left" style="width:40%;font-size:14px;">Team info : </td>
                                </tr>
                                
                                <tr>
                                    <td class="text-left" colspan="2" style="font-size:14px;">
                                        Hobby : 
                                        <div style="padding:5px; height:50px; border: 2px solid gray;">{{$applicant->hobby}}</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                        
                        <div style="background: rgb(0,112,192,.5); height:2px; margin-left:-100px; width: 125%; margin-bottom:50px;"></div>
                        
                        
                        
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <td style="width:15%;">
                                        <div>
                                            <img src="{{asset('/backend/assets/img/email_logo.png')}}" style="max-hight:40px;width:93px;">
                                        </div>
                                        <br>

                                    </td>
                                    <td class="text-center" style="width:70%;font-weight: bold;font-size:35px;">
                                        <div style="margin-bottom:20px;">AIUB FILM CLUB</div>
                                    </td>
                                    <td  style="width:15%" class="text-right" style="font-size:14px; text-align: right;">
                                        Candidate Copy
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                                <tr style="background:rgb(0 112 192); margin-top:20px;">
                                    <td colspan="2">
                                        <div class="m1 text-center" style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0)!important; width:170px; margin:10px 0px 2px 35px;">
                                            Member Recruitment Form
                                        </div>
                                    </td>
                                    <td>
                                        <div class="m1 text-center" style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0)!important; width:100px; margin:10px 20px 2px 0px;">
                                            DBAN : {{str_pad($applicant->id, 3, '0', STR_PAD_LEFT)}}
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        
                        <table class="table table-borderless" style="margin-top:-20px;">
                            <tbody>
                                <tr>
                                    <td class="text-left" style="width:60%;font-size:14px;  padding:10px 0px;">Applicant's Name : {{$applicant->name}}</td>
                                    <td class="text-left" style="width:40%;font-size:14px;  padding:10px 0px;">Contact Info : {{$applicant->phone}}</td>
                                </tr>
                                
                                <tr>
                                    <td class="text-left" style="width:60%;font-size:14px;  padding:10px 0px;">AIUB ID : {{$applicant->aiub_id}}</td>
                                    <td class="text-left" style="width:40%;font-size:14px;  padding:10px 0px;">Team info : </td>
                                </tr>
                                
                                <tr>
                                    @php
                                        $categories=json_decode($applicant->categories);
                                    @endphp
                                    <td class="text-left" style="width:60%;font-size:14px;">
                                        Categories Selected :
                                        <ul>
                                            @foreach($categories as $cat)
                                            <li style="font-weight: bold;">{{$cat}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-left" style="width:40%;font-size:14px;"></td>
                                </tr>
                                
                                <tr>
                                    <td class="text-left" style="width:70%;font-size:14px;">
                                        Things to keep in mind-
                                        <br>
                                        <br>
                                        <b>#Team work</b> is the core skill that is needed to be a part of AFC. A team work will be assigned in your selection process, so be in the mental state of cooperating with your team members.
                                        <br>
                                        <br>
                                        <b>#Be Respective #Be On Time #Be Responsible</b>
                                    </td>
                                    <td style="width:30%; font-size:14px; text-align:right;">
                                        <img src="{{asset('/')}}frontend/img/qr.png" style="height:90px; margin-right: 20px; margin-top:-20px;">
                                        <div style="background:rgb(91 155 213); text-align:center; color:#fff;margin:15px; padding:5px;">
                                            SCAN THIS QR CODE TO BE UPDATED ABOUT OUR RECRUITMENT RESULT
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left" colspan="2" style="font-size:12px;">
                                        For any query, Call {{json_decode($contact_footer->link_or_text)->phone}} or Visit our website: <a href="https://aiubfilmclub.com">www.aiubfilmclub.com</a> or Email us on: {{json_decode($contact_footer->link_or_text)->email}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

    </body>
</html>
