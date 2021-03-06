@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">

  {{-- <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">All Forms</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">HNBL</a></li>
            <li class="active">Health Register</li>
        </ol>
    </div>
</div> --}}

<div class="row">
    <!-- Basic example -->
    <div class="col-md-2"></div>
    <div class="col-md-10 ">
        <div class="panel panel-default">


 <div class="card pd-20 pd-sm-40 mg-t-50">
    <h6 class="card-body-title">HNBL Health Register Form</h6>
    <p class="mg-b-20 mg-sm-b-30">All Employee Data is here</p>

    <div class="table-responsive">
      <table class="table table-bordered mg-b-0">

        <thead>
          <tr>
            
            <th>Emp ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Section</th>
            <th>Employee Type</th>
            <th>Phone</th>
            <th>Date Of Join</th>

          </tr>
        </thead>

        <tbody>
            @foreach($employees as $row) 
          <tr>
            
            <td>{{ $row->emp_id }}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->department}}</td>
            <td>{{$row->section}}</td>
            <td>{{$row->type}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->dateOfJoin}}</td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
    </div><!-- table-responsive -->
  </div><!-- card -->
        </div>
    </div>
</div>


</div> <!-- container -->
    
</div> <!-- content -->
</div>


@endsection