<?php

namespace App\Services;

use App\Models\Vehicles;

class VehicleService
{
    public function getVehicles(): array
       {
           return Vehicles::all()->toArray();
       }

       public function addVehicle(array $data): Vehicles
       {
           return Vehicles::create($data);
       }
}
