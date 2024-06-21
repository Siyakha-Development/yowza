<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            1 => [
                'role' => [1],
            ],
            // Add other user roles as needed
        ];

        foreach ($items as $userId => $item) {
            $user = User::find($userId);

            foreach ($item['role'] as $roleId) {
                $role = Role::find($roleId);
                $user->assignRole($role);
            }
        }
    }
}
