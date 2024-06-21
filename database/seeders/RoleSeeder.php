<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            ['name' => 'Administrator (can create other users)', 'guard_name' => 'web'],
            ['name' => 'Individual', 'guard_name' => 'web'],
            ['name' => 'Corporate Sponsors', 'guard_name' => 'web'],
            ['name' => 'Development Partners', 'guard_name' => 'web'],
            ['name' => 'SMME', 'guard_name' => 'web'],

        ];

        foreach($items as $item){
            Role::create($item);
        }
    }
}
