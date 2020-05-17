@extends('admin.admin_layout')
@section('admin_content')
<div class="content-page">
  <div class="content">
        {{-- <div class="container"> --}}

            <div class="sl-mainpanel">
            <div class="sl-pagebody"


  <div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">HNBL Health Portal</h6>
    <p class="mg-b-20 mg-sm-b-30">Health Declaration Report.</p>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-10p">Emp ID</th>
            <th class="wd-15p">Name</th>
            <th class="wd-15p">Department</th>
            <th class="wd-10p">Temp</th>
            <th class="wd-10p">Travel</th>
            <th class="wd-10p">Contact History</th>
            <th class="wd-15p">Previous History</th>
            <th class="wd-15p">Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach($forms as $row) 
          <tr>
            
            <td>{{ $row->employee_id }}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->department}}</td>
            <td>{{$row->temp}}</td>
            <td>{{$row->travel}}</td>
            <td>{{$row->contactWithAffected}}</td>
            <td>{{$row->previousHistory}}</td>
            <td>{{$row->created_at}}</td>
          </tr>
          @endforeach

         
        </tbody>
      </table>

    </div><!-- table-wrapper -->
  </div><!-- card -->

            </div>  
        {{-- </div> --}}
 
  
</div> <!-- container -->
    
</div> <!-- content -->
</div>


@endsection