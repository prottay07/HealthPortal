<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Employee;
class AdminController extends Controller
{

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function logout()
    {
        Auth::logout();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->route('admin.login')->with($notification);
    }

    public function AllEmployee()
    { 	
    //   $employees=Employee::all();
      $employees = DB::table('employees')->orderBy('emp_id', 'ASC')->get();
      
    //   echo '<pre>';
    //   print_r($employees);
    //   exit();
    	return view('admin.employee_report', compact('employees'));
    }

    public function AllForm()
    {
        $forms=DB::table('forms')
                ->join('employees', 'forms.employee_id', 'employees.emp_id')
                ->select('forms.*', 'employees.name', 'employees.department', 'employees.age')
                ->orderBy('employee_id', 'ASC')
                ->get();
        return view('admin.form_report', compact('forms'));
    }


}
