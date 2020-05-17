<?php

namespace App\Http\Controllers;
use App\Form;
use DB;
use App\Exports\FormsExport;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('add_form');
    }

  //insert employee
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'employee_id' => 'required|max:255',
        'temp' => 'required',
        'travel' => 'required',
        'symptom1' => 'required',
        'symptom2' => 'required',
        'previousHistory' => 'required',
        'contactWithAffected' => 'required',
        'smoke' => 'required',

        ]);

        // $data=array();
        // $data['employee_id']=$request->employee_id;
        // $data['temp']=$request->temp;
        // $data['travel']=$request->travel;
        // $data['smoke']=$request->smoke;
        // $data['contactWithAffected']=$request->contactWithAffected;
       
       
       
      
       
        $symptom1 = implode(",", $request->get('symptom1'));
        $symptom2 = implode(",", $request->get('symptom2'));
        $prevhistory =  implode(",", $request->get('previousHistory'));

       $success =  DB::table('forms')->insert(
          [
          'employee_id' => $request->input('employee_id'), 
          'temp' => $request->input('temp'), 
          'travel' => $request->input('travel'), 
          'symptom1' => $symptom1, 
          'symptom2' => $symptom2,
          'previoushistory' => $prevhistory,
          'smoke' => $request->input('smoke'),
          'contactWithAffected' => $request->input('contactWithAffected'),
        
          ]
      );

      if($success){
        $notification=array(
          'messege'=>'Successfully Form Inserted ',
          'alert-type'=>'success'
           );
          return Redirect()->back()->with($notification);
      }      
         
     else{

       return Redirect()->back();
      }

    }

    public function AllForm()
    {
        $forms=DB::table('forms')
                ->join('employees', 'forms.employee_id', 'employees.emp_id')
                ->select('forms.*', 'employees.name', 'employees.department', 'employees.age')
                ->orderBy('employee_id', 'ASC')
                ->get();
        return view('all_form', compact('forms'));
    }

    public function export() 
{
    return Excel::download(new FormsExport, 'forms.xlsx');
}

} //End Class
