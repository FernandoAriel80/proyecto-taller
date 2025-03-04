<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class VehicleType extends Model
{
   
    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }
  
}
