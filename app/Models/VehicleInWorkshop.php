<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleInWorkshop extends Model
{
    protected $table = "vehicles_in_workshop";
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'vehicle_type',
        'brand',
        'license_plate',
        'year',
        'description',
        'status_id',
        'check_in_date',
        'check_out_date',
    ];

    public function assignedEmployees()
    {
        return $this->hasMany(AssignedEmployee::class, 'vehicle_in_workshop_id');
    }
}
