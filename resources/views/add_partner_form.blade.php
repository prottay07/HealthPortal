@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Partner's Info</h4><br><br>
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
        <div class="panel-heading"><h3 class="panel-title"> Health Declaration Form</h3></div>
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
            <form role="form" action="{{ url('/insert-partner-form') }}" method="post" enctype="multipart/form-data">
                @csrf

    <div class="form-group">
        <label for="exampleInputEmail1"><strong>1. Name</strong></label>
        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword21"><strong>2. Name of Company </strong></label> <br>
        <input type="radio"  name="companyName" value="NML"/> Niloy Motors Ltd. <br>
        <input type="radio"  name="companyName" value="Nepcon"/> Nepcon <br>
        <input type="radio" name="companyName" value="Elite"/> Elite Security<br>
        
    </div>  
    
    <div class="form-group">
        <label for="exampleInputEmail1"><strong>3. Age </strong></label>
        <input type="text" class="form-control" name="age" placeholder="Your age" required>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1"><strong>4. Phone </strong></label>
        <input type="text" class="form-control" name="phone" placeholder="Phone Number">
    </div>

               

<div class="form-group">
    <label for="exampleInputPassword21"><strong>5. Body Temprature (Farenhite)</strong></label> <br>
    <input type="radio"  name="temp" value="96-98.6"/> 96-98.6 <br>
    <input type="radio"  name="temp" value="98.6-99.3"/> 98.6-99.3 <br>
    <input type="radio" name="temp" value="99.4-102"/> 99.4-102<br>
    <input type="radio"  name="temp" value="102-above"/> 102-above <br>
    <input type="radio"  name="temp" value="Don't Know"/>Don't Know <br>
</div>

           

<div class="form-group">
    <label for="exampleInputPassword21"><strong>6. Do You have any of the following flu like symptoms?</strong></label> <br>
    <input type="checkbox"  name="symptom1[]" value="Shortness of Breath"/> Shortness of Breath <br>
    <input type="checkbox"  name="symptom1[]" value="Dry Cough"/> Sore Throat (গলা ব্যাথা)  <br>
    <input type="checkbox"  name="symptom1[]" value="Very Weak"/> Very Weak (need help from others) <br>
    <input type="checkbox"  name="symptom1[]" value="Cold or runny nose"/> Cold or runny nose ) <br>
    <input type="checkbox"  name="symptom1[]" value="Very Weak"/> Exhausion  <br>
    <input type="checkbox"  name="symptom1[]" value="Diarhea"/> Diarhea <br>
    <input type="checkbox"  name="symptom1[]" value="None of Above "/> None of Above <br>
    
</div>

<div class="form-group">
    <label for="exampleInputPassword21"><strong>7. Do You have any following symptoms?</strong></label> <br>
    <input type="checkbox"  name="symptom2[]" value="Abdominal pain, vomiting or thin stools"/> Abdominal pain, vomiting or thin stools <br>
    <input type="checkbox"  name="symptom2[]" value="Felling of chest pain or pressure"/> Felling of chest pain or pressure <br>
    <input type="checkbox"  name="symptom2[]" value="Can't smell with the nose"/> Can't smell with the nose <br>
    <input type="checkbox"  name="symptom2[]" value="Itchy or red eyes"/> Itchy or red eyes <br>
    <input type="checkbox"  name="symptom2[]" value="Drowsiness"/> Drowsiness <br>
    <input type="checkbox"  name="symptom2[]" value="None of above"/> None of above <br>
</div>


        <div class="form-group">
        <label for="exampleInputPassword12"><strong>8. Travel In last 14 days?</strong></label><br>
        <input type="radio"  name="travel" value="Yes"/> Yes <br>
        <input type="radio"  name="travel" value="No"/> No <br>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword12"><strong>9. Do you have smoking habit?</strong></label> <br>
        <input type="radio"  name="smoke" value="Yes"/> Yes <br>
        <input type="radio"  name="smoke" value="No"/> No <br>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword12"><strong>10. Have you been in contact with someeone with fever, cough or shortness of breath in last 14 days? (eg. family members or co-worker)</strong></label> <br>
            <input type="radio"  name="contactWithAffected" value="Yes"/> Yes <br>
            <input type="radio"  name="contactWithAffected" value="No"/> No <br>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword21"><strong> 11. Previous History of Illness?</strong></label> <br>
        <input type="checkbox"  name="previousHistory[]" value="Lung Problems"/> Lung Problems<br>
        <input type="checkbox"  name="previousHistory[]" value="High Blood Pressure"/> High Blood Pressure <br>
        <input type="checkbox"  name="previousHistory[]" value="Heart desase"/> Heart desase <br>
        <input type="checkbox"  name="previousHistory[]" value="Diabates "/> Diabates <br>
        <input type="checkbox"  name="previousHistory[]" value="Kidney Problem"/> Kidney Problem <br>
        <input type="checkbox"  name="previousHistory[]" value="None of Above"/> None of Above <br>
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