@extends('backend.layouts.app')
@section('title', 'Recruitment Settings')
@section('css')

@endsection
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Recruitment Settings</h4>
        </div>
        <div class="card-body">
          <center>
              <label>To active or close recruitment application use this button.</label><br>
              @if($app_status->status!=1)
                <a href="{{route('admin.recruitment.settings.app_status',1)}}" class="btn btn-success">Active Now</a>
              @else
                <a href="{{route('admin.recruitment.settings.app_status',0)}}" class="btn btn-danger">Close Application</a>
              @endif
              
              <hr>
              <label>Delete all applications.</label><br>
              <a href="{{route('apply.delete')}}" class="btn btn-success">Delete All</a>
              
          </center>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripets')

@endsection
