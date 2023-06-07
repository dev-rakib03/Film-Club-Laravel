@extends('backend.layouts.app')
@section('title', 'All Applicants')
@section('css')
<link rel="stylesheet" href="{{asset('/')}}public/backend/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('/')}}public/backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Applications</h4>
          <div class="card-header-action">
            <a href="{{route('apply.send.email')}}" class="btn btn-primary">Send Email</a>
            <a href="#" class="btn btn-primary">Send SMS</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="tableExport">
              <thead>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>AIUB ID</th>
                  <th>Department</th>
                  <th>Semester Completed</th>
                  <th>CGPA</th>
                  <th>Gender</th>
                  <th>Blood Group</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Categories</th>
                  <th>Address</th>
                  {{--<th>Action</th>--}}
                </tr>
              </thead>
              <tbody>
                @foreach ($all_applicant as $applicant)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{ucfirst($applicant->name)}}</td>
                    <td>{{$applicant->aiub_id}}</td>
                    <td>{{$applicant->department}}</td>
                    <td>{{$applicant->semester}}</td>
                    <td>{{$applicant->cgpa}}</td>
                    <td>{{$applicant->gender}}</td>
                    <td>{{$applicant->blood_group}}</td>
                    <td>{{$applicant->email}}</td>
                    <td>{{$applicant->phone}}</td>
                    <td>
                        @php
                            $allcat='';
                            $categories=json_decode($applicant->categories);
                            foreach($categories as $cat){
                                $allcat=$allcat.$cat.', ';
                            }
                        @endphp
                       {{rtrim($allcat,', ')}}
                    </td>
                    <td>{{$applicant->address}}</td>
                    {{--<td>
                        <a class="btn btn-info" href="{{asset('/')}}success/{{$applicant->id}}" target="_blank">View</a>
                    </td>--}}
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
<script src="{{asset('/')}}public/backend/assets/bundles/datatables/datatables.min.js"></script>
<script src="{{asset('/')}}public/backend/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}public/backend/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="{{asset('/')}}public/backend/assets/js/page/datatables.js"></script>
<script>
    $('.buttons-pdf').hide();
</script>
@endsection
