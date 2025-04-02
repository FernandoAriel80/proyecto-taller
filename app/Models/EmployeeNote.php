<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeNote extends Model
{
    protected $table = "employee_notes";
    protected $fillable = [
        "assigned_employee_id",
        "description",
        "image_url",
    ];
}
