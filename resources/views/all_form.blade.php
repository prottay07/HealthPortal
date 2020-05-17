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

    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title text-white">Form Export
          <a href="{{route('form.export')}}" class="pull-right btn btn-danger btn-sm">Download Xlsx</a></h3>
      </div>

    <div class="table-responsive">
      <table class="table table-bordered mg-b-0">

        <thead>
          <tr>
            
            <th>Emp ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Temperature</th>
            <th>Travel History (last 14 days)</th>
            <th>Contact Case</th>
            <th>Other Deseases</th>
          </tr>
        </thead>

        <tbody>
            @foreach($forms as $row) 

          @if($row->temp === "99.4-102" || $row->temp === "102-above"  OR $row->travel === 'Yes' OR $row->contactWithAffected=== 'Yes')
          <tr class="table-danger">
            
            <td>{{ $row->employee_id }}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->department}}</td>
            <td> {{$row->temp}} </td>
            <td>{{$row->travel}}</td>
            <td>{{$row->contactWithAffected}}</td>
            <td>{{$row->previousHistory}}</td>
          </tr>
            @else
            <tr>
            
              <td>{{ $row->employee_id }}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->department}}</td>
              <td> {{$row->temp}} </td>
              <td>{{$row->travel}}</td>
              <td>{{$row->contactWithAffected}}</td>
              <td>{{$row->previousHistory}}</td>
            </tr>
            

            @endif
            
            
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