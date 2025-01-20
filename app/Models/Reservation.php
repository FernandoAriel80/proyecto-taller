<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date',
        'time',
        'description',
        'user_id',
        'vehicle_id',
    ] ;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
  
}
