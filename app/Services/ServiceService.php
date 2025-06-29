<?php

namespace App\Services;

use App\Models\Services;

class ServiceService
{
    public function getServices(): array
       {
           return Services::with('vehicle')->get()->toArray();
       }

       public function addService(array $data): Services
       {
           return Services::create($data);
       }

       public function updateService(string $id, array $data): ?Services
       {
           $service = Services::find($id);
           if ($service) {
               $service->update($data);
               return $service;
           }
           return null;
       }
}
