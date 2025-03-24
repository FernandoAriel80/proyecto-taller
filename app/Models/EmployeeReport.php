<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeReport extends Model
{
    protected $table = "employee_reports";

    protected $fillable = [
        'assigned_employee_id',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function assignedEmployees()
    {
        return $this->hasMany(AssignedEmployee::class);
    }
}
