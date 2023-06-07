@extends('backend.layouts.app')
@section('title', 'About Settings')
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
                <h4>About</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.about.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input readonly hidden type="text" name="about_type" value="about_us">
                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Title *</label>
                                <input type="text" class="form-control" required name="title">
                            <div class="invalid-feedback">
                                What's your Title?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0"> Image *(max: 1mb)</label>
                                <input type="file" accept="image/*" class="form-control" required name="image">
                            <div class="invalid-feedback">
                                Select your Image?
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label  class="section-title mt-0">Body *</label>
                                <textarea  class="form-control" required name="body" style="height: 250px!important;"></textarea>
                            <div class="invalid-feedback">
                                What's your Body Text?
                            </div>
                        </div>

                    </div>


                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Add</button>
                    </div>
                    <hr>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Body</th>
                            </tr>
                            @foreach ($abouts as $about)
                            @php
                                $about_json=json_decode($about->link_or_text);
                            @endphp
                            <tr>
                                <td class="text-center">{{$about_json->title}}</td>
                                <td class="text-center"><img src="{{asset('/').$about_json->image}}" style="max-width: 200px;"></td>
                                <td class="text-center">{{$about_json->body}}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.pages.about.edit', $about->id) }}" class="btn btn-primary" style="margin: 5px;">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('admin.pages.about.destroy', $about->id) }}"
                                        onclick="event.preventDefault(); delete_slider('delete-form-{{ $about->id }}');" style="margin: 5px;">
                                        Delete
                                    </a>
                                    <form id="delete-form-{{ $about->id }}" action="{{ route('admin.pages.about.destroy', $about->id) }}" method="POST" style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>About Footer</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.about.update',$about_footer->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @php
                        $about_json=json_decode($about_footer->link_or_text);
                    @endphp
                    <div class="row">
                        <input readonly hidden type="text" name="about_type" value="about_footer">
                        <div class="form-group col-md-12">
                            <label  class="section-title mt-0">Footer About Body *</label>
                                <textarea  class="form-control" required name="body" style="height: 250px!important;">{{$about_json->body}}</textarea>
                            <div class="invalid-feedback">
                                What's your Footer About Body Text?
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


<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>About Project</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.about.update',$projects->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @php
                        $about_json=json_decode($projects->link_or_text);
                    @endphp
                    <div class="row">
                        <input readonly hidden type="text" name="about_type" value="projects">
                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Awards *</label>
                                <input type="number" class="form-control" required name="awards" value="{{$about_json->awards}}">
                            <div class="invalid-feedback">
                                What's your Awards?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Completed Work</label>
                            <input type="number" class="form-control" required name="complete_works" value="{{$about_json->complete_works}}">
                            <div class="invalid-feedback">
                                What's your Completed Work?
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

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>EXECUTIVE PANEL</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Designation</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Speech</th>
                            </tr>
                            @foreach ($executives as $executive)
                            @php
                                $executive_json=json_decode($executive->link_or_text);
                            @endphp
                            <tr>
                                <td class="text-center">{{$executive_json->name}}</td>
                                <td class="text-center">{{$executive_json->title}}</td>
                                <td class="text-center">{{$executive_json->email}}</td>
                                <td class="text-center"><img src="{{asset('/').$executive_json->image}}" style="max-width: 200px;"></td>
                                <td class="text-center">{{$executive_json->spech}}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.pages.about.edit', $executive->id) }}" class="btn btn-primary" style="margin: 5px;">Edit</a>
                                </td>
                            </tr>
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
