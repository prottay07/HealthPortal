<?php

namespace App\Exports;

use App\Employee;
use App\Form;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class FormsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       

      
        $form = DB::table('forms')
                    ->join('employees', 'forms.employee_id', 'employees.emp_id')
                    ->select('forms.employee_id', 'employees.name', 'employees.department', 'employees.age', 'forms.temp', 'forms.symptom1', 'forms.symptom2', 'forms.travel')
                    ->get();
        return $form;
        // return Employee::select('emp_id', 'name', 'department', 'section', 'designation','type', 'phone','age','dateOfJoin','photo' )->get();
      
    }

    public function headings(): array
    {
        return [
            'Emp ID',
            'Name',
            'Department',
            'Age',
            'Temprature',
            'Symptom',
            'Symptom2',
            'Travel',
        ];
    }
    

    
}
