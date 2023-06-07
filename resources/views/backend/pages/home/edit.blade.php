@extends('backend.layouts.app')
@section('title', 'Edit Slider')
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
                <h4>Slider Edit</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.home.update',$home_sliders->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Slider Title *</label>
                                <input type="text" class="form-control" required name="text" value="{{$home_sliders->text}}">
                            <div class="invalid-feedback">
                                What's your Slider Title?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Slider Image (Select a image if you want to update)</label>
                                <input type="file" accept="image/*" class="form-control" name="image">
                            <div class="invalid-feedback">
                                Select your Slider Image?
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label  class="section-title mt-0">Button Text (optional)</label>
                                <input type="text" class="form-control" name="btn_text" value="{{$home_sliders->btn_text}}">
                            <div class="invalid-feedback">
                                What's your Button Text?
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label  class="section-title mt-0">Button Link (optional)</label>
                                <input type="text" class="form-control" name="btn_link" value="{{$home_sliders->btn_link}}">
                            <div class="invalid-feedback">
                                What's your Button Link?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Play Button Link (optional)</label>
                                <input type="text" class="form-control" name="play_btn_link" value="{{$home_sliders->play_btn_link}}">
                            <div class="invalid-feedback">
                                What's your Play Button Link?
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
