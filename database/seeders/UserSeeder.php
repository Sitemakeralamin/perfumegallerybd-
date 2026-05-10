<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'       => 'Admin',
                'last_name'  => 'User',
                'email'      => 'admin@example.com',
                'phone'      => '01700000000',
                'type'       => 1,
                'is_active'  => 1,
                'password'   => Hash::make('password'),
            ]
        );

        // CRM user
        User::updateOrCreate(
            ['email' => 'crm@example.com'],
            [
                'name'       => 'CRM',
                'last_name'  => 'User',
                'email'      => 'crm@example.com',
                'phone'      => '01711111111',
                'type'       => 3,
                'is_active'  => 1,
                'password'   => Hash::make('password'),
            ]
        );

        // Sample customers
        $customers = [
            [
                'name'      => 'Rahim',
                'last_name' => 'Uddin',
                'email'     => 'rahim@example.com',
                'phone'     => '01722222222',
            ],
            [
                'name'      => 'Karim',
                'last_name' => 'Hossain',
                'email'     => 'karim@example.com',
                'phone'     => '01733333333',
            ],
            [
                'name'      => 'Fatema',
                'last_name' => 'Begum',
                'email'     => 'fatema@example.com',
                'phone'     => '01744444444',
            ],
        ];

        foreach ($customers as $customer) {
            User::updateOrCreate(
                ['email' => $customer['email']],
                array_merge($customer, [
                    'type'      => 2,
                    'is_active' => 1,
                    'password'  => Hash::make('password'),
                ])
            );
        }
    }
}
