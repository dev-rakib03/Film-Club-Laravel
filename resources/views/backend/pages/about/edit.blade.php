@extends('backend.layouts.app')
@section('title', 'Edit About')
@section('css')
<link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/css/components.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .custom-control-label {
        text-transform: capitalize;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>About Edit</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.about.update',$about->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    @php
                        $about_json=json_decode($about->link_or_text);
                    @endphp
                    <div class="row">
                        <input readonly hidden type="text" name="about_type" value="about_us">
                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Title *</label>
                                <input type="text" class="form-control" required name="title" value="{{$about_json->title}}">
                            <div class="invalid-feedback">
                                What's your Title?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0"> Image (max: 1mb)</label>
                                <input type="file" accept="image/*" class="form-control" name="image">
                            <div class="invalid-feedback">
                                Select your Image?
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label  class="section-title mt-0">Body *</label>
                                <textarea  class="form-control" required name="body" style="height: 250px!important;">{{$about_json->body}}</textarea>
                            <div class="invalid-feedback">
                                What's your Body Text?
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripets')
<!-- JS Libraies -->
<script src="{{asset('/')}}backend/assets/bundles/datatables/datatables.min.js"></script>
<script src="{{asset('/')}}backend/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}backend/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="{{asset('/')}}backend/assets/js/page/datatables.js"></script>
@endsection
