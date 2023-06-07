@php
use App\Models\pageelements;
$contact_footer=pageelements::where('row_type','contact_footer')->first();
@endphp
<!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <meta name="format-detection" content="date=no">
  <meta name="format-detection" content="telephone=no">
  <style type="text/CSS"></style>
  <style @import url('https://dopplerhealth.com/fonts/BasierCircle/basiercircle-regular-webfont.woff2');></style>
  <title></title>
  <!--[if mso]>
  <style>
    table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
    div, td {padding:0;}
    div {margin:0 !important;}
	</style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table,
    td,
    div,
    h1,
    p {
      font-family: 'Basier Circle', 'Roboto', 'Helvetica', 'Arial', sans-serif;
      margin:0px;
      padding:0px;
    }

    @media screen and (max-width: 530px) {
      .unsub {
        display: block;
        padding: 8px;
        margin-top: 14px;
        border-radius: 6px;
        background-color: #FFEADA;
        text-decoration: none !important;
        font-weight: bold;
      }

      .button {
        min-height: 42px;
        line-height: 42px;
      }

      .col-lge {
        max-width: 100% !important;
      }
    }

    @media screen and (min-width: 531px) {
      .col-sml {
        max-width: 27% !important;
      }

      .col-lge {
        max-width: 73% !important;
      }
    }
  </style>
</head>

<body style="margin:0;padding:0;word-spacing:normal;background-color:#FDF8F4;">
  <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#FDF8F4;">
    <table role="presentation" style="width:100%; height:100%; border:none;border-spacing:0;">
      <tr>
        <td align="center" style="padding:0;">
          <!--[if mso]>
          <table role="presentation" align="center" style="width:600px;">
          <tr>
          <td>
          <![endif]-->
          <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:'Basier Circle', 'Roboto', 'Helvetica', 'Arial', sans-serif;font-size:1em;line-height:1.37em;color:#384049;">
            <!--      Logo headder -->
            <tr>
              <td style="padding:40px 30px 30px 30px;text-align:center;font-size:1.5em;font-weight:bold;">
                <a href="{{asset('/')}}" style="text-decoration:none;">
                  <img width="2170" alt="AIUB FILM CLUB" style="width:auto;max-width:30%;height:auto;border:none;text-decoration:none;color:#ffffff;" src="{{asset('/')}}backend/assets/img/email_logo.png">
                </a>
              </td>
            </tr>
            <!--      Intro Section -->
            <tr>
              <td style="padding:30px;background-color:#ffffff;">
                @php
                    echo $email_body;
                @endphp
                <br>
                <br>
                <p style="color:red;">Download your application and bring it on viva board:</p>
               
               <p style="text-align: center;margin: 2.5em auto;">
                  <a class="button" href="https://aiubfilmclub.com/alrady/applied" target="_blank" style="background: #DE4D3B; 
                       text-decoration: none; 
                       padding: 1em 1.5em;
                       color: #ffffff; 
                       border-radius: 48px;
                       mso-padding-alt:0;
                       text-underline-color:#ff3884">
                    <!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%;mso-text-raise:20pt">&nbsp;</i><![endif]-->
                    <span style="mso-text-raise:10pt;font-weight:bold;">Download Your Application</span>
                    <!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%">&nbsp;</i><![endif]-->
                  </a>
                </p>

                <p style="padding:0px;margin:0px;">Thank You,</p>
                <p style="padding:0px;margin:0px;">AIUB FILM CLUB</p>
                <p style="padding:0px;margin:0px;">Phone: {{json_decode($contact_footer->link_or_text)->phone}}</p>
                <p style="padding:0px;margin:0px;"><a href="https://aiubfilmclub.com">www.aiubfilmclub.com</a></p>
              </td>
            </tr>
            
            <tr>
              <td style="padding:30px;text-align:center;font-size: 12px;background-color:#ffeada;color:#384049;border: 1em solid #fff;">

                    
                    @foreach ($socials_footer as $social)
                        @if ($social->name=="Facebook" && $social->link!=null)
                            <a href="{{$social->link}}" target="_blank" >Facebook</a>
                        @endif
                        @if ($social->name=="Instagram" && $social->link!=null)
                            <a href="{{$social->link}}" target="_blank" >Instagram</a>
                        @endif
                        @if ($social->name=="Youtube" && $social->link!=null)
                            <a href="{{$social->link}}" target="_blank" >Youtube</a>
                        @endif
                        @if ($social->name=="Twitter" && $social->link!=null)
                            <a href="{{$social->link}}" target="_blank" >Twitter</a>
                        @endif
                    @endforeach

                
                <p style="margin:0;font-size:.75rem;line-height:1.5em;text-align: center;">
                  Copyright © 2009 AIUB FILM CLUB. All Rights Reserved.
                  <br>
                  <a class="unsub" href="{{asset('/')}}" style="color:#384049;text-decoration:underline;">www.aiubfilmclub.com</a>
                </p>
                
              </td>
            </tr>
            
            
          </table>
          <!--[if mso]>
          </td>
          </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
    </table>
  </div>
</body>

</html>