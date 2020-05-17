<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AttendanceController extends Controller
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
      return view('add_attendance');
    }

  //insert employee
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'emp_id' => 'required|max:255',
        
        
        ]);

        $data=array();
        $data['emp_id']=$request->emp_id;
        $data['date']=$request->date;

        $attend =DB::table('attendances')
                         ->insert($data);
        
        if ($attend) {
        $notification=array(
        'messege'=>'Successfully Employee Inserted ',
        'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
        }
        else{
            $notification=array(
               'messege'=>'error ',
               'alert-type'=>'danger'
                );
               return Redirect()->back()->with($notification);
           }      
        
        
    }

//all attendance return here
    public function AllAttendance()
    { 	
        
       

        $data = DB::table('attendances')
        
  ->select(\DB::raw('emp_id, date, MIN(att_time) AS InTime, MAX(att_time) AS OutTime'))
  ->groupBy('emp_id','date')
  ->get();

        // echo '<pre>';
        // print_r($data);
        // exit();
                
                    
         return view('att_report', compact('data'));
    }
}
