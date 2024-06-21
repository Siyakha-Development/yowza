<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name'=>'Finance'],
            ['name'=>'SMME'],
            ['name'=>'Business'],
            ['name'=>'Growth'],
            ['name'=>'South Africa'],
            ['name'=>'Funding'],
        ];

        //insert tags into the database
        foreach ($tags as $tag)
        {
            Tag::create($tag);
        }
    }
}
