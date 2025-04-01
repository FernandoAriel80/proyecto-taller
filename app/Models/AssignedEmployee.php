<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedEmployee extends Model
{
    protected $fillable = [
        'user_id',
        'vehicle_in_workshop_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function vehicleInWorkshop()
    {
        return $this->belongsTo(VehicleInWorkshop::class, 'vehicle_in_workshop_id');
    }
    public function employeeReport()
    {
        return $this->hasMany(EmployeeReport::class);
    }
}
