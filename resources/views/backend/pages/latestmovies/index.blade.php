@extends('backend.layouts.app')
@section('title', 'Latest Movies')
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
                <h4>Add Movie</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.latest_movies.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Name *</label>
                                <input type="text" class="form-control" required name="name">
                            <div class="invalid-feedback">
                                What's your movie name?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Banner Image * (width:270px,height:330px)</label>
                                <input type="file" accept="image/*" class="form-control" required name="image">
                            <div class="invalid-feedback">
                                What's your movie banner image?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Trailer Link (YouTube) *</label>
                                <input type="text" class="form-control" required name="video_link">
                            <div class="invalid-feedback">
                                What's your movie Trailer Link (YouTube)?
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label  class="section-title mt-0">Type *</label>
                                <input type="text" class="form-control" required name="type">
                            <div class="invalid-feedback">
                                What's your movie type?
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label  class="section-title mt-0">Release Date *</label>
                                <input type="date" class="form-control" required name="relese_date">
                            <div class="invalid-feedback">
                                What's your movie release date?
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label  class="section-title mt-0">Status *</label>
                                <select class="form-control" name="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            <div class="invalid-feedback">
                                What's your movie release date?
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
                <h4>All Movies</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">Serial</th>
                          <th class="text-center">Title</th>
                          <th class="text-center">Banner Image</th>
                          <th class="text-center">Trailer</th>
                          <th class="text-center">Type</th>
                          <th class="text-center">Release Date</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($latest_films as $movie)
                        <tr>
                            <td class="text-center">
                              {{$loop->index+1}}
                            </td>
                            <td class="text-center">{{ucfirst($movie->name)}}</td>
                            <td class="text-center"><img src="{{asset('/')}}{{$movie->image}}" style="max-width: 200px;"></td>
                            <td class="text-center"><a href="{{$movie->video_link}}" target="_blank">Click here</a></td>
                            <td class="text-center">{{$movie->type}}</td>
                            <td class="text-center">{{$movie->relese_date}}</td>
                            <td class="text-center">
                                <span style="color:green;">{{$movie->status==1?'Active':''}}</span>
                                <span style="color:red;">{{$movie->status==0?'Inctive':''}}</span>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.pages.latest_movies.edit', $movie->id) }}" class="btn btn-primary" style="margin: 5px;">Edit</a>
                                <a class="btn btn-danger" href="{{ route('admin.pages.latest_movies.destroy', $movie->id) }}"
                                    onclick="event.preventDefault();delete_slider('delete-form-{{ $movie->id }}');">
                                    Delete
                                </a>
                                <form id="delete-form-{{ $movie->id }}" action="{{ route('admin.pages.latest_movies.destroy', $movie->id) }}" method="POST" style="display: none;">
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
