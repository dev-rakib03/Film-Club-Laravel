@extends('backend.layouts.app')
@section('title', 'Edit Movie')
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
                <h4>Edit Movie</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.latest_movies.update',$latest_film->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Name *</label>
                                <input type="text" class="form-control" required name="name" value="{{$latest_film->name}}">
                            <div class="invalid-feedback">
                                What's your movie name?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Banner Image (width:270px,height:330px) (select image if you want to change)</label>
                                <input type="file" accept="image/*" class="form-control" name="image">
                            <div class="invalid-feedback">
                                What's your movie banner image?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Trailer Link (YouTube) *</label>
                                <input type="text" class="form-control" required name="video_link" value="{{$latest_film->video_link}}">
                            <div class="invalid-feedback">
                                What's your movie Trailer Link (YouTube)?
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label  class="section-title mt-0">Type *</label>
                                <input type="text" class="form-control" required name="type" value="{{$latest_film->type}}">
                            <div class="invalid-feedback">
                                What's your movie type?
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label  class="section-title mt-0">Release Date *</label>
                                <input type="date" class="form-control" required name="relese_date" value="{{$latest_film->relese_date}}">
                            <div class="invalid-feedback">
                                What's your movie release date?
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label  class="section-title mt-0">Status *</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{$latest_film->status==1?'selected':''}}>Active</option>
                                    <option value="0" {{$latest_film->status==0?'selected':''}}>Inactive</option>
                                </select>
                            <div class="invalid-feedback">
                                What's your movie release date?
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
