<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vehicle_in_workshop_id'
    ] ;
}
