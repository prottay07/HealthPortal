<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
       'emp_id', 'name', 'department', 'section', 'designation','type', 'phone','age','dateOfJoin','photo'
    ];
}
