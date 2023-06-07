@extends('backend.layouts.app')
@section('title', 'Edit Member')
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
                <h4>Member Edit</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.afcian.update',$member->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Name *</label>
                                <input type="text" class="form-control" required name="name" value="{{$member->name}}">
                            <div class="invalid-feedback">
                                What's member name?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">AIUB ID *</label>
                                <input type="text" class="form-control" required name="aiub_id"  value="{{$member->aiub_id}}">
                            <div class="invalid-feedback">
                                What's member ID?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Email *</label>
                                <input type="email" class="form-control" required name="email"  value="{{$member->email}}">
                            <div class="invalid-feedback">
                                What's member ID?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0"> Image * <span style="font-size: 12px;">(max: 512kb, size: 270 X 330px)</span></label>
                                <input type="file" accept="image/*" class="form-control" name="image">
                            <div class="invalid-feedback">
                                Select your Image?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Facebook URL (optional)</label>
                                <input type="url" class="form-control" name="facebook"  value="{{$member->facebook}}">
                            <div class="invalid-feedback">
                                What's member facebook url?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Joining Date *</label>
                                <input type="date" class="form-control" required name="joining_date"  value="{{$member->joining_date}}">
                            <div class="invalid-feedback">
                                What's member joining date?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Leave Date (optional)</label>
                                <input type="date" class="form-control" name="leave_date"  value="{{$member->leave_date}}">
                            <div class="invalid-feedback">
                                What's member leave date?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Designation *</label>
                                <select class="form-control" required name="designation">
                                    <option value="Member" {{$member->designation=="Member"?'selected':''}} >Member</option>
                                    <option value="Junior Executive" {{$member->designation=="Junior Executive"?'selected':''}} >Junior Executive</option>
                                    <option value="Executive" {{$member->designation=="Executive"?'selected':''}} >Executive</option>
                                </select>
                            <div class="invalid-feedback">
                                What's member designation?
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
