<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'license_plate',
        'model',
        'current_mileage',
        'fuel_type',
        'year',
        'brand_id',
        'vehicle_type_id',
        'user_id',    
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    
}
