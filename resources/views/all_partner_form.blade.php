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
    <h6 class="card-body-title">Self Health Declaration Form</h6>
    <p class="mg-b-20 mg-sm-b-30">All Partner's Data is here</p>

    <div class="table-responsive">
      <table class="table table-bordered mg-b-0">

        <thead>
          <tr>
            
            <th>Company Name</th>
            <th>Name</th>
            <th>phone</th>
            <th>Temperature</th>
            <th>Travel History (last 14 days)</th>
            <th>Contact Case</th>
            <th>Other Deseases</th>
          </tr>
        </thead>

        <tbody>
            @foreach($forms as $row) 
          <tr>
            
            <th>{{$row->companyName}}</th>
            <td>{{$row->name}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->temp}}</td>
            <td>{{$row->travel}}</td>
            <td>{{$row->contactWithAffected}}</td>
            <td>{{$row->previousHistory}}</td>
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