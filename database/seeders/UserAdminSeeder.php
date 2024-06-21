<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [

            ['id' => 1, 'name' => 'admin', 'lastname' => 'mimi', 'email' => 'kingsley.kgwedi@siyakha.co.za', 'password' => bcrypt('123'), 'remember_token' => '',],

        ];

        foreach ($items as $item) {
            User::create($item);
        }
    }
}
