<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Parts;
use App\Models\Services;
use App\Models\User;
use App\Models\Vehicles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Users
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'manager',
        ]);
        User::create([
            'name' => 'Receptionist User',
            'email' => 'receptionist@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'receptionist',
        ]);
        User::create([
            'name' => 'Mechanic User',
            'email' => 'mechanic@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'mechanic',
        ]);

        // Vehicles
        $vehicles = [
            ['make' => 'Toyota', 'model' => 'Camry', 'year' => 2020, 'licensePlate' => 'ABC123'],
            ['make' => 'Ford', 'model' => 'F-150', 'year' => 2018, 'licensePlate' => 'XYZ789'],
            ['make' => 'Honda', 'model' => 'Civic', 'year' => 2021, 'licensePlate' => 'DEF456'],
        ];
        foreach ($vehicles as $vehicle) {
            Vehicles::create($vehicle);
        }

        // Services
        $services = [
            [
                'vehicle_id' => 1,
                'status' => 'new-service',
                'assignedMechanic' => null,
                'createdAt' => '2024-01-15 10:00:00',
            ],
            [
                'vehicle_id' => 2,
                'status' => 'in-service',
                'assignedMechanic' => 'Mechanic User',
                'createdAt' => '2024-01-14 09:00:00',
            ],
            [
                'vehicle_id' => 3,
                'status' => 'completed',
                'assignedMechanic' => 'Mechanic User',
                'createdAt' => '2024-01-13 08:00:00',
            ],
        ];
        foreach ($services as $service) {
            Services::create($service);
        }

        // Parts
        $parts = [
            ['name' => 'Oil Filter', 'quantity' => 5, 'lowStockThreshold' => 10],
            ['name' => 'Brake Pads', 'quantity' => 15, 'lowStockThreshold' => 10],
            ['name' => 'Air Filter', 'quantity' => 8, 'lowStockThreshold' => 10],
        ];
        foreach ($parts as $part) {
            Parts::create($part);
        }
    }
}
