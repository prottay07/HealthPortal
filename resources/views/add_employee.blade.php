@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Employee Info</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">HNBL</a></li>
                        <li class="active">Health Register</li>
                    </ol>
                </div>
            </div>

<!-- Start Widget -->
<div class="row">
<!-- Basic example -->
<div class="col-md-2"></div>
<div class="col-md-8 ">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>
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
            <form role="form" action="{{ url('/insert-employee') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Employee ID</label>
                    <input type="text" class="form-control" name="emp_id" placeholder="Employee ID" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Full Name"required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword12">Department</label>
                    <select name="department" class="form-control">
                        <option disabled="" selected=""></option>
                        <option value="Admin">Admin</option>
                        <option value="Admin">Civil</option>
                        <option value="HR & ER">HR & ER</option>
                        <option value="IT">IT</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Material">Material</option>
                        <option value="Production">Production</option>
                        <option value="Safety">Safety</option>
                        <option value="Quality">Quality</option>
 
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword21">Section</label>
                    <input type="text" class="form-control" name="section" placeholder="Section">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword21">Designation</label>
                    <input type="text" class="form-control" name="designation">
                </div>

                 <div class="form-group">
                    <label for="exampleInputPassword12">Employee Type</label>
                    <select name="type" class="form-control" placeholder="Select department">
                        <option disabled="" selected=""></option>
                        <option value="Permanent">Permanent</option>
                        <option value="Contractual">Contractual</option>
                      
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword18">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword17">Age</label>
                    <input type="text" class="form-control" name="age" placeholder="Age"required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword41">Date of Join</label>
                    <input type="date" class="form-control" name="dateOfJoin" placeholder="Joining Date">
                </div>
                
                <div class="form-group">
                    <img id="image" src="#" />
                    <label for="exampleInputPassword11">Photo</label>
                    <input type="file"  name="photo" accept="image/*"  onchange="readURL(this);">
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

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection