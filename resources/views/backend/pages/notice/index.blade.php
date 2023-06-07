@extends('backend.layouts.app')
@section('title', 'Notice')
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
                <h4>Add Notice</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.notice.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Title *</label>
                                <input type="text" class="form-control" required name="title">
                            <div class="invalid-feedback">
                                What's your Title?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0"> Image *(max: 1mb, width:370px,height:250px)</label>
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
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>All Notice</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">Serial</th>
                          <th class="text-center">Title</th>
                          <th class="text-center">Image</th>
                          <th class="text-center">Body</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($notices as $notice)
                        <tr>
                            <td class="text-center">
                              {{$loop->index+1}}
                            </td>
                            <td class="text-center">{{ucfirst($notice->title)}}</td>
                            <td class="text-center"><img src="{{asset('/')}}{{$notice->image}}" style="max-width: 200px;"></td>
                            <td class="text-center">{{$notice->body}}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.pages.notice.edit', $notice->id) }}" class="btn btn-primary" style="margin: 5px;">Edit</a>
                                <a class="btn btn-danger" href="{{ route('admin.pages.notice.destroy', $notice->id) }}"
                                    onclick="event.preventDefault();delete_slider('delete-form-{{ $notice->id }}');">
                                    Delete
                                </a>
                                <form id="delete-form-{{ $notice->id }}" action="{{ route('admin.pages.notice.destroy', $notice->id) }}" method="POST" style="display: none;">
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
