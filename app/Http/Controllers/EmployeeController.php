<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Employee;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
      return view('add_employee');
    }

  //insert employee
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'emp_id' => 'required|max:255',
        'name' => 'required|max:255',
        'department' => 'required',
        'type' => 'required',
        ]);

        $data=array();
        $data['emp_id']=$request->emp_id;
        $data['name']=$request->name;
        $data['department']=$request->department;
        $data['section']=$request->section;
        $data['designation']=$request->designation;
        $data['phone']=$request->phone;
        $data['type']=$request->type;
        $data['age']=$request->age;
        $data['dateOfJoin']=$request->dateOfJoin;
        $image=$request->file('photo');

        if ($image) {
            $image_name= Str::random(40);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('home')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }
    }

//all employees return here
    public function AllEmployee()
    { 	
      // $employees=Employee::all()->sortBy('emp_id', 'ASC');
      $employees = DB::table('employees')->orderBy('emp_id', 'ASC')->get();
    	return view('all_employee', compact('employees'));
    }

// //view a single employee
//     public function ViewEmployee($id)
//     {
//         $single=DB::table('employees')
//                 ->where('id',$id)
//                 ->first();
//         return view('view_employee', compact('single'));     
//     }

// //delete a single employee
//     public function DeleteEmployee($id)
//     {
//          $delete=DB::table('employees')
//                 ->where('id',$id)
//                 ->first();
//          $photo=$delete->photo;
//          unlink($photo);
//          $dltuser=DB::table('employees')
//                   ->where('id',$id)
//                   ->delete();
//          if ($dltuser) {
//                  $notification=array(
//                  'messege'=>'Successfully Employee Deleted ',
//                  'alert-type'=>'success'
//                   );
//                 return Redirect()->route('all.employee')->with($notification);                      
//              }else{
//               $notification=array(
//                  'messege'=>'error ',
//                  'alert-type'=>'success'
//                   );
//                  return Redirect()->back()->with($notification);
//              }               


//     }
// //single emplyee data show for edit
//     public function EditEmployee($id)
//     {
//         $edit=DB::table('employees')
//              ->where('id',$id)
//              ->first();
//         return view('edit_employee', compact('edit'));     
//     }
// //update a single employee
//     public function UpdateEmployee(Request $request,$id)
//     {
//         $validatedData = $request->validate([
//         'name' => 'required|max:255',
//         'email' => 'required|max:255',
//         'nid_no' => 'required|max:255',
//         'address' => 'required',
//         'phone' => 'required|max:13',
//         'salary' => 'required',
//         ]);

//         $data=array();
//         $data['name']=$request->name;
//         $data['email']=$request->email;
//         $data['phone']=$request->phone;
//         $data['address']=$request->address;
//         $data['experience']=$request->experience;
//         $data['nid_no']=$request->nid_no;
//         $data['salary']=$request->salary;
//         $data['vacation']=$request->vacation;
//         $data['city']=$request->city;
//         $image=$request->photo;

//       if ($image) {
//        $image_name=str_random(20);
//        $ext=strtolower($image->getClientOriginalExtension());
//        $image_full_name=$image_name.'.'.$ext;
//        $upload_path='public/employee/';
//        $image_url=$upload_path.$image_full_name;
//        $success=$image->move($upload_path,$image_full_name);
//        if ($success) {
//           $data['photo']=$image_url;
//              $img=DB::table('employees')->where('id',$id)->first();
//              $image_path = $img->photo;
//              $done=unlink($image_path);
//           $user=DB::table('employees')->where('id',$id)->update($data); 
//          if ($user) {
//                 $notification=array(
//                 'messege'=>'Employee Update Successfully',
//                 'alert-type'=>'success'
//                  );
//                return Redirect()->route('all.employee')->with($notification);                      
//             }else{
//               return Redirect()->back();
//              } 
//           }
//       }else{
//          $oldphoto=$request->old_photo;
//          if ($oldphoto) {
//           $data['photo']=$oldphoto;  
//           $user=DB::table('employees')->where('id',$id)->update($data); 
//          if ($user) {
//                 $notification=array(
//                 'messege'=>'Employee Update Successfully',
//                 'alert-type'=>'success'
//                  );
//                return Redirect()->route('all.employee')->with($notification);                      
//             }else{
//               return Redirect()->back();
//              } 
//           }
//        }
//     }

// // Import And Export Functiom

// public function export() 
// {
//     return Excel::download(new EmployeesExport, 'employees.xlsx');
// }

// public function ImportEmployee() 
// {
//     return view('import_employee');
// }


//products import and export
public function ImportEmployee()
{
  return view('import_employee');
}

public function export() 
{
    return Excel::download(new EmployeesExport, 'employees.xlsx');
}


 public function import(Request $request) 
{
    $import=Excel::import(new EmployeesImport, $request->file('import_file'));
     if ($import) {
            $notification=array(
            'messege'=>'Employees Import Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);                      
        }else{
          return Redirect()->back();
         } 
      
}

} //End Class

