<?php

namespace App\Services;

use App\Models\Parts;

class PartService
{
    public function getParts(): array
       {
           return Parts::all()->toArray();
       }

       public function addPart(array $data): Parts
       {
           return Parts::create($data);
       }

       public function updatePart(string $id, array $data): ?Parts
       {
           $part = Parts::find($id);
           if ($part) {
               $part->update($data);
               return $part;
           }
           return null;
       }

       public function deletePart(string $id): void
       {
           Parts::destroy($id);
       }
}
