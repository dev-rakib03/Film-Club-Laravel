@extends('backend.layouts.app')
@section('title', 'Contact')
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
                <h4>Contact</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.contact.update',$contact->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        @php
                            $contact_json=json_decode($contact->link_or_text);
                        @endphp
                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Address *</label>
                                <input type="text" class="form-control" required name="address" value="{{$contact_json->address}}">
                            <div class="invalid-feedback">
                                What's your address?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Phone *</label>
                                <input type="tel" class="form-control" required name="phone"  value="{{$contact_json->phone}}">
                            <div class="invalid-feedback">
                                What's your phone?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Email *</label>
                                <input type="email" class="form-control" required name="email"  value="{{$contact_json->email}}">
                            <div class="invalid-feedback">
                                What's your email?
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
