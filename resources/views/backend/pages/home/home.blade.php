@extends('backend.layouts.app')
@section('title', 'Home Settings')
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
                <h4>Sliders</h4>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate="" action="{{route('admin.pages.home.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Slider Title *</label>
                                <input type="text" class="form-control" required name="text">
                            <div class="invalid-feedback">
                                What's your Slider Title?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Slider Image *</label>
                                <input type="file" accept="image/*" class="form-control" required name="image">
                            <div class="invalid-feedback">
                                Select your Slider Image?
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label  class="section-title mt-0">Button Text (optional)</label>
                                <input type="text" class="form-control" name="btn_text">
                            <div class="invalid-feedback">
                                What's your Button Text?
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label  class="section-title mt-0">Button Link (optional)</label>
                                <input type="text" class="form-control" name="btn_link">
                            <div class="invalid-feedback">
                                What's your Button Link?
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="section-title mt-0">Play Button Link (optional)</label>
                                <input type="text" class="form-control" name="play_btn_link">
                            <div class="invalid-feedback">
                                What's your Play Button Link?
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
                        @foreach ($home_sliders as $home_slider)
                            <tr>
                                <td class="text-center">{{$home_slider->text}}</td>
                                <td class="text-center"><img src="{{asset('/').$home_slider->image}}" style="max-width: 200px;"></td>
                                <td class="text-center">{{$home_slider->btn_text}}</td>
                                <td class="text-center">{{$home_slider->btn_link}}</td>
                                <td class="text-center">{{$home_slider->play_btn_link}}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.pages.home.edit', $home_slider->id) }}" class="btn btn-primary" style="margin: 5px;">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('admin.pages.home.destroy', $home_slider->id) }}"
                                        onclick="event.preventDefault(); delete_slider('delete-form-{{ $home_slider->id }}');" style="margin: 5px;">
                                        Delete
                                    </a>
                                    <form id="delete-form-{{ $home_slider->id }}" action="{{ route('admin.pages.home.destroy', $home_slider->id) }}" method="POST" style="display: none;">
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
