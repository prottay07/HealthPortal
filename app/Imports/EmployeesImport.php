<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            
                'emp_id'=>$row[0],
                'name'=>$row[1],
                'department'=>$row[2],
                'section'=>$row[3],
                'designation'=>$row[4],
                'type'=>$row[5],
                'phone'=>$row[6],
                'age'=>$row[7],
                'dateOfJoin'=>$row[8],
                'photo'=>$row[9],
                
            
        ]);
    }
}
