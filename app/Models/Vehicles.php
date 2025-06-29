<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'status', 'assignedMechanic', 'createdAt'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class);
    }
}
