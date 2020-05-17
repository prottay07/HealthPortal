@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Employee Daily Attendance</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">HNBL</a></li>
                        <li class="active">Entry Attendance</li>
                    </ol>
                </div>
            </div>

<!-- Start Widget -->
<div class="row">
<!-- Basic example -->
<div class="col-md-2"></div>
<div class="col-md-8 ">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Add Attendance</h3></div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panel-body">
            <form role="form" action="{{ url('/insert-attendance') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d");?>" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Employee ID</label>
                    <input type="text" class="form-control" name="emp_id" placeholder="Employee ID" required>
                </div>

                
                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
            </form>
        </div><!-- panel-body -->
    </div> <!-- panel -->
</div> <!-- col-->

</div>
</div> <!-- container -->
    
</div> <!-- content -->
</div>

@endsection