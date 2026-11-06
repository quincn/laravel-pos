<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin01',
                'full_name' => 'John Smith',
            ],
            [
                'username' => 'cashier01',
                'full_name' => 'Sarah Lee',
            ],
            [
                'username' => 'cashier02',
                'full_name' => 'Mark Reyes',
            ],
            [
                'username' => 'manager01',
                'full_name' => 'Anna Cruz',
            ],
            [
                'username' => 'staff01',
                'full_name' => 'Kevin Santos',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']],
                $user
            );
        }
    }
}
