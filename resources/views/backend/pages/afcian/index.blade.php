@extends('backend.layouts.app')
@section('title', 'Member')
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
                <h4>Add Member</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.afcian.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Name *</label>
                                <input type="text" class="form-control" required name="name">
                            <div class="invalid-feedback">
                                What's member name?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">AIUB ID *</label>
                                <input type="text" class="form-control" required name="aiub_id">
                            <div class="invalid-feedback">
                                What's member ID?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0">Email *</label>
                                <input type="email" class="form-control" required name="email">
                            <div class="invalid-feedback">
                                What's member ID?
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="section-title mt-0"> Image * <span style="font-size: 12px;">(max: 512kb, size: 270 X 330px)</span></label>
                                <input type="file" accept="image/*" class="form-control" required name="image">
                            <div class="invalid-feedback">
                                Select your Image?
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label  class="section-title mt-0">Facebook URL (optional)</label>
                                <input type="url" class="form-control" name="facebook">
                            <div class="invalid-feedback">
                                What's member facebook url?
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label  class="section-title mt-0">Joining Date *</label>
                                <input type="date" class="form-control" required name="joining_date">
                            <div class="invalid-feedback">
                                What's member joining date?
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label  class="section-title mt-0">Designation *</label>
                                <select class="form-control" required name="designation">
                                    <option value="Member" selected >Member</option>
                                    <option value="Junior Executive">Junior Executive</option>
                                    <option value="Executive">Executive</option>
                                </select>
                            <div class="invalid-feedback">
                                What's member designation?
                            </div>
                        </div>

                    </div>


                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>All Member</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">Serial</th>
                          <th class="text-center">Info</th>
                          <th class="text-center">AIUB ID</th>
                          <th class="text-center">Image</th>
                          <th class="text-center">Joining Date</th>
                          <th class="text-center">Leave Date</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($members as $member)
                            @if($member->designation=='Executive')
                                <tr>
                                    <td class="text-center">
                                      {{$i++}}
                                    </td>
                                    <td class="text-center">
                                        {{$member->name}}<br>
                                        {{$member->email}}<br>
                                        @if ($member->facebook)
                                            <a href="{{$member->facebook}}" target="_blank">Facebook</a><br>
                                        @endif
                                        @if ($member->leave_date)
                                            <span style="color: red">Alumni </span>
                                        @else
                                            <span style="color: green">{{$member->designation}}</span>
                                        @endif
        
                                    </td>
                                    <td class="text-center">{{$member->aiub_id}}</td>
                                    <td class="text-center"><img src="{{asset('/')}}{{$member->image}}" style="max-width: 150px;"></td>
                                    <td class="text-center">{{$member->joining_date}}</td>
                                    <td class="text-center">{{$member->leave_date}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.pages.afcian.edit', $member->id) }}" class="btn btn-primary" style="margin: 5px;">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('admin.pages.afcian.destroy', $member->id) }}"
                                            onclick="event.preventDefault();delete_slider('delete-form-{{ $member->id }}');">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $member->id }}" action="{{ route('admin.pages.afcian.destroy', $member->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        
                        
                        @foreach ($members as $member)
                            @if($member->designation=='Junior Executive')
                                <tr>
                                    <td class="text-center">
                                      {{$i++}}
                                    </td>
                                    <td class="text-center">
                                        {{$member->name}}<br>
                                        {{$member->email}}<br>
                                        @if ($member->facebook)
                                            <a href="{{$member->facebook}}" target="_blank">Facebook</a><br>
                                        @endif
                                        @if ($member->leave_date)
                                            <span style="color: red">Alumni </span>
                                        @else
                                            <span style="color: green">{{$member->designation}}</span>
                                        @endif
        
                                    </td>
                                    <td class="text-center">{{$member->aiub_id}}</td>
                                    <td class="text-center"><img src="{{asset('/')}}{{$member->image}}" style="max-width: 150px;"></td>
                                    <td class="text-center">{{$member->joining_date}}</td>
                                    <td class="text-center">{{$member->leave_date}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.pages.afcian.edit', $member->id) }}" class="btn btn-primary" style="margin: 5px;">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('admin.pages.afcian.destroy', $member->id) }}"
                                            onclick="event.preventDefault();delete_slider('delete-form-{{ $member->id }}');">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $member->id }}" action="{{ route('admin.pages.afcian.destroy', $member->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        
                        
                        @foreach ($members as $member)
                            @if($member->designation=='Member')
                                <tr>
                                    <td class="text-center">
                                      {{$i++}}
                                    </td>
                                    <td class="text-center">
                                        {{$member->name}}<br>
                                        {{$member->email}}<br>
                                        @if ($member->facebook)
                                            <a href="{{$member->facebook}}" target="_blank">Facebook</a><br>
                                        @endif
                                        @if ($member->leave_date)
                                            <span style="color: red">Alumni </span>
                                        @else
                                            <span style="color: green">{{$member->designation}}</span>
                                        @endif
        
                                    </td>
                                    <td class="text-center">{{$member->aiub_id}}</td>
                                    <td class="text-center"><img src="{{asset('/')}}{{$member->image}}" style="max-width: 150px;"></td>
                                    <td class="text-center">{{$member->joining_date}}</td>
                                    <td class="text-center">{{$member->leave_date}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.pages.afcian.edit', $member->id) }}" class="btn btn-primary" style="margin: 5px;">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('admin.pages.afcian.destroy', $member->id) }}"
                                            onclick="event.preventDefault();delete_slider('delete-form-{{ $member->id }}');">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $member->id }}" action="{{ route('admin.pages.afcian.destroy', $member->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                      </tbody>
                    </table>
                  </div>

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function delete_slider(s_id){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            document.getElementById(s_id).submit();
        }
        })
    }
</script>
@endsection
