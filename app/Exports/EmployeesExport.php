<?php

namespace App\Exports;

use App\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::select('emp_id', 'name', 'department', 'section', 'designation','type', 'phone','age','dateOfJoin','photo' )->get();
    }
}
