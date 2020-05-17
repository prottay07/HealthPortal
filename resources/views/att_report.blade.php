@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">



<div class="row">
    <!-- Basic example -->
    <div class="col-md-2"></div>
    <div class="col-md-10 ">
        <div class="panel panel-default">


 <div class="card pd-20 pd-sm-40 mg-t-50">
    <h6 class="card-body-title">HNBL Daily Attendance</h6>
    <p class="mg-b-20 mg-sm-b-30">All Attendance Data Is Here</p>

    <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">

        <thead>
          <tr>
            
            <th>Date</th>
            <th>Emp ID</th>
            <th>Entrance time</th>
            <th>Exit time</th>
            {{-- <th>Out time</th> --}}

            {{-- <th>Name</th>
            <th>Department</th>
            <th>Section</th>
            <th>Employee Type</th>
            <th>Phone</th>
            <th>Date Of Join</th> --}}

          </tr>
        </thead>

        <tbody>
            @foreach($data as $row) 

            <?php 
            $intime = explode(' ',$row->InTime);
            $outtime = explode(' ',$row->OutTime);
          ?>
          <tr>
            <td>{{ $row->date }}</td>
            <td>{{ $row->emp_id }}</td>
            <td>{{ $intime[1] }}</td>
            <td>{{ $outtime[1] }}</td>
            {{-- <td>{{$row->department}}</td>
            <td>{{$row->section}}</td>
            <td>{{$row->type}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->dateOfJoin}}</td> --}}
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