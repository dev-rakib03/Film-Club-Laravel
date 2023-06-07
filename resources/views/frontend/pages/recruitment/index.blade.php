@extends('frontend.layouts.app')
@section('title','MEMBER RECRUITMENT')
@section('css')

@endsection
@section('header-content')
    <!-- Header Menu Area Start -->
    <!-- Breadcamb Area Start -->
    <section class="breadcamb-area bg-17 bg-overlay-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcamb-content text-center text-white text-uppercase">
                        <h1>MEMBER RECRUITMENT</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcamb Area End -->
@endsection
@section('content')

       <div class="page-content">
            <!-- About Us Area Start -->
            <section class="about-area pt-50 pb-50">
                <div class="container">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $error }}</li><br>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div style=" text-align: justify; font-weight: bold;">
                        
                            Welcome to the first step of AFC Membership. Only an existing AIUB student can apply for membership in AIUB Film Club. <br>
                        <br>
                            Please fill up the form carefully with authentic information. No changes can be made once your application is submitted.<br>
                        <br>    
                            For any queries please contact -<br>
                            Shawon Shutradhar - 01643183468<br>
                            Rifat Wali Aditto - 01537743782<br>
                        <br>
                    </div>
                    <form action="{{route('post.apply.form')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name (Last Name, First Name)*</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{Request::old('name')}}" placeholder="Write your name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aiub_id">AIUB ID (xx-xxxxx-x)*</label>
                                    <input type="text" class="form-control" id="aiub_id" name="aiub_id" value="{{Request::old('aiub_id')}}" placeholder="xx-xxxxx-x" minlength="10" maxlength="10">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="department">Department *</label>
                                    {{--<input type="text" class="form-control" id="department" name="department" placeholder="Department">--}}
                                    <select class="form-select" name="department" label="Department">
                                        <option value="" disabled selected hidden>Please Choose...</option>
                                        <option value="LL.B" {{Request::old('department')=='LL.B'?'selected':''}}>LL.B</option>
                                        <option value="BSS in Economics" {{Request::old('department')=='BSS in Economics'?'selected':''}}>BSS in Economics</option>
                                        <option value="BA in English" {{Request::old('department')=='BA in English'?'selected':''}}>BA in English</option>
                                        <option value="BA in MMC" {{Request::old('department')=='BA in MMC'?'selected':''}}>BA in MMC</option>
                                        <option value="BBA" {{Request::old('department')=='BBA'?'selected':''}}>BBA</option>
                                        <option value="EEE" {{Request::old('department')=='EEE'?'selected':''}}>EEE</option>
                                        <option value="CoE" {{Request::old('department')=='CoE'?'selected':''}}>CoE</option>
                                        <option value="IPE" {{Request::old('department')=='IPE'?'selected':''}}>IPE</option>
                                        <option value="Architecture" {{Request::old('department')=='Architecture'?'selected':''}}>Architecture</option>
                                        <option value="BSc in CSE" {{Request::old('department')=='BSc in CSE'?'selected':''}}>BSc in CSE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="semester">Semester Completed at AIUB (If fresher write 0)*</label>
                                    <input type="number" class="form-control" id="semester" name="semester" placeholder="0" value="{{Request::old('semester')}}" minlength="1" maxlength="1">
                                </div>
                            </div>
                        </div>    
                            
                        <div class="row">    
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cgpa">CGPA (If fresher write 0)*</label>
                                    <input type="text" class="form-control" id="cgpa" name="cgpa" value="{{Request::old('cgpa')}}" placeholder="0.00">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cgpa">Gender *</label>
                                    <div class="form-check">
                                      <input class="form-check-input" {{Request::old('gender')=='Male'?'checked':''}} type="radio" name="gender" id="male" value="Male">
                                      <label class="form-check-label" for="male">
                                        Male
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" {{Request::old('gender')=='Female'?'checked':''}} type="radio" name="gender" id="female" value="Female">
                                      <label class="form-check-label" for="female">
                                        Female
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" {{Request::old('gender')=='Other'?'checked':''}} type="radio" name="gender" id="other" value="Other">
                                      <label class="form-check-label" for="other">
                                        Other
                                      </label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blood_group">Blood Group *</label>
                                    <select class="form-select" name="blood_group" label="Blood Group">
                                        <option value="" disabled selected hidden>Please Choose...</option>
                                        <option value="A+" {{Request::old('blood_group')=='A+'?'selected':''}}>A positive(+)</option>
                                        <option value="A-" {{Request::old('blood_group')=='A-'?'selected':''}}>A negative(-)</option>
                                        <option value="B+" {{Request::old('blood_group')=='B+'?'selected':''}}>B positive(+)</option>
                                        <option value="B-" {{Request::old('blood_group')=='B-'?'selected':''}}>B negative(-)</option>
                                        <option value="O+" {{Request::old('blood_group')=='O+'?'selected':''}}>O positive(+)</option>
                                        <option value="O-" {{Request::old('blood_group')=='O-'?'selected':''}}>O negative(-)</option>
                                        <option value="AB+" {{Request::old('blood_group')=='AB+'?'selected':''}}>AB positive(+)</option>
                                        <option value="AB-" {{Request::old('blood_group')=='AB-'?'selected':''}}>AB negative(-)</option>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Current Address *</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{Request::old('address')}}" placeholder="Current address...">
                                </div>    
                            </div>
                        </div> 
                        
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone *</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{Request::old('phone')}}" placeholder="01000000000" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" minlength="11" maxlength="11">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{Request::old('email')}}" placeholder="Write your email">
                                </div>    
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categories">Categories (You can apply in 2 categories at most.)*</label>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Actor/Actress'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Actor/Actress'?'checked':'':""}} id="categories4" name="categories[]" value="Actor/Actress">
                                                <label class="form-check-label" for="categories4">
                                                    Actor/Actress
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Cinematographer'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Cinematographer'?'checked':'':""}} id="categories2" name="categories[]" value="Cinematographer">
                                                <label class="form-check-label" for="categories2">
                                                    Cinematographer
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Director'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Director'?'checked':'':""}} id="categories1" name="categories[]" value="Director">
                                                <label class="form-check-label" for="categories1">
                                                    Director
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Editor'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Editor'?'checked':'':""}} id="categories5" name="categories[]" value="Editor">
                                                <label class="form-check-label" for="categories5">
                                                    Editor
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Graphics Designer'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Graphics Designer'?'checked':'':""}} id="categories3" name="categories[]" value="Graphics Designer">
                                                <label class="form-check-label" for="categories3">
                                                    Graphics Designer
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Make-up Artist'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Make-up Artist'?'checked':'':""}} id="categories10" name="categories[]" value="Make-up Artist">
                                                <label class="form-check-label" for="categories10">
                                                    Make-up Artist
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Production Manager'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Production Manager'?'checked':'':""}} id="categories7" name="categories[]" value="Production Manager">
                                                <label class="form-check-label" for="categories7">
                                                    Production Manager
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Script Writer'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Script Writer'?'checked':'':""}} id="categories6" name="categories[]" value="Script Writer">
                                                <label class="form-check-label" for="categories6">
                                                    Script Writer
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Set Designer'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Set Designer'?'checked':'':""}} id="categories9" name="categories[]" value="Set Designer">
                                                <label class="form-check-label" for="categories9">
                                                    Set Designer
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{isset(Request::old('categories')[0])?Request::old('categories')[0]=='Story Board Developer'?'checked':'':""}} {{isset(Request::old('categories')[1])?Request::old('categories')[1]=='Story Board Developer'?'checked':'':""}} id="categories8" name="categories[]" value="Story Board Developer">
                                                <label class="form-check-label" for="categories8">
                                                    Story Board Developer
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hobby">Passonate About / Hobby *</label>
                                    {{--<input type="text" class="form-control" id="hobby" name="hobby" placeholder="Write your hobby" oninput="count_hobby_word()">--}}
                                    <textarea type="text" class="form-control" id="hobby" name="hobby" placeholder="Write your hobby..." oninput="count_hobby_word()" maxlength="100" style="height:100%;">{{Request::old('hobby')}}</textarea>
                                    <label><span id="hobby_l_count">0</span>/100</label>
                                </div> 
                            </div>
                        </div>
                        
                        <div class="row pt-10">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    
                    <div class="row  pt-10 m-0">
                                <a href="{{route('alrady.applied')}}" class="btn btn-info" style="color:#fff;">Download Your Application</a>
                    </div>
                    
                </div>
            </section>
        </section>
@endsection
@section('script')
<script>
    var length = 2;
    $('input[type=checkbox]').on('change', function (e) {
        if ($('input[type=checkbox]:checked').length > length) {
            $(this).prop('checked', false);
            alert("You can select only "+length+" categories!");
        }
    });
    
    function count_hobby_word(){
        var my_string = $('#hobby').val();
        $('#hobby_l_count').html(my_string.length);
    }
    
    
    function insert_text(main_string, ins_string, pos) {
       if(typeof(pos) == "undefined") {
        pos = 0;
      }
       if(typeof(ins_string) == "undefined") {
        ins_string = '';
      }
       return main_string.slice(0, pos) + ins_string + main_string.slice(pos);
    }
    
    function makeformat(){
        var aiub_id = $('#aiub_id').val();
        console.log(aiub_id);
        if(aiub_id.length>2 && aiub_id[2]!='-'){
            var m_aiub_id = insert_text(aiub_id, '-' , 2);
            $('#aiub_id').val(m_aiub_id);
        }
        if(aiub_id.length>8 && aiub_id[8]!='-'){
            var m_aiub_id = insert_text(aiub_id, '-' , 2);
            m_aiub_id = insert_text(m_aiub_id, '-' , 8);
            $('#aiub_id').val(m_aiub_id);
        }
    }
</script>
@endsection
