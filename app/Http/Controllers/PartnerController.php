<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PartnerController extends Controller
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
      return view('add_partner_form');
    }

  //insert employee
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required',
        'companyName' => 'required',
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

       $success =  DB::table('partners')->insert(
          [
          'name' => $request->input('name'),
          'companyName' => $request->input('companyName'),
          'age' => $request->input('age'),
          'phone' => $request->input('phone'), 
          'temp' => $request->input('temp'), 
          'travel' => $request->input('travel'), 
          'symptom1' => $symptom1, 
          'symptom2' => $symptom2,
          'previousHistory' => $prevhistory,
          'smoke' => $request->input('smoke'),
          'contactWithAffected' => $request->input('contactWithAffected'),
        
          ]
      );

      if($success){
        $notification=array(
          'messege'=>'Successfully Partners Form Inserted ',
          'alert-type'=>'success'
           );
          return Redirect()->back()->with($notification);
      }      
         
     else{

       return Redirect()->back();
      }

    }

    public function AllPartner()
    {
        $forms=DB::table('partners')
                ->orderBy('companyName', 'ASC')
                ->get();
        return view('all_partner_form', compact('forms'));
    }
}
