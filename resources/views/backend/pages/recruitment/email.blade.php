@extends('backend.layouts.app')
@section('title', 'Send Email')
@section('css')
  <link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/jquery-selectric/selectric.css">
  <style>
      .note-editable p{
              margin: 0px!important;
      }
  </style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Send Email</h4>
        </div>
        <div class="card-body">
            <form action="{{route('apply.send.email.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subject *</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="subject" required>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body *</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple" name="body" required></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Publish</button>
                  </div>
                </div>    
            </form>
            
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripets')
<!-- JS Libraies -->
  <script src="{{asset('/')}}backend/assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="{{asset('/')}}backend/assets/bundles/codemirror/lib/codemirror.js"></script>
  <script src="{{asset('/')}}backend/assets/bundles/codemirror/mode/javascript/javascript.js"></script>
  <script src="{{asset('/')}}backend/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="{{asset('/')}}backend/assets/bundles/ckeditor/ckeditor.js"></script>
<!-- Page Specific JS File -->
  <script src="{{asset('/')}}backend/assets/js/page/ckeditor.js"></script>
@endsection
