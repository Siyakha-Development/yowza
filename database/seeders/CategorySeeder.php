<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Define categories and seed them
        // $categories  = [
        //   ['name'=>'Finance', 'category_image'=>fake()->imageUrl(70, 40)],
        //   ['name'=>'Management','category_image'=>fake()->imageUrl(70, 40)],
        //   ['name'=>'Marketing and Sales','category_image'=>fake()->imageUrl(70, 40)],
        //   ['name'=>'Personal Growth','category_image'=>fake()->imageUrl(70, 40)],
        //   ['name'=>'Customer Service','category_image'=>fake()->imageUrl(70, 40)],
        //   ['name'=>'Funding','category_image'=>fake()->imageUrl(70, 40)],
        //   ['name'=>'Entrepreneurship','category_image'=>fake()->imageUrl(70, 40)],
        // ];
        $faker = Faker::create();

        // Define categories and seed them
        $categories  = [
            ['name' => 'Finance', 'category_image' => $faker->imageUrl(70, 40)],
            ['name' => 'Management', 'category_image' => $faker->imageUrl(70, 40)],
            ['name' => 'Marketing and Sales', 'category_image' => $faker->imageUrl(70, 40)],
            ['name' => 'Personal Growth', 'category_image' => $faker->imageUrl(70, 40)],
            ['name' => 'Customer Service', 'category_image' => $faker->imageUrl(70, 40)],
            ['name' => 'Funding', 'category_image' => $faker->imageUrl(70, 40)],
            ['name' => 'Entrepreneurship', 'category_image' => $faker->imageUrl(70, 40)],
        ];

        //insert  categories into the database
        foreach ($categories as $category)
        {
            Category::create($category);
        }
    }
}
