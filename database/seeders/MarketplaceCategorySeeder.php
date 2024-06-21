<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MarketplaceCategory;

class MarketplaceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Vehicles',
            'Property Rentals',
            'Classifieds',
            'Electronics',
            'Entertainment',
            'Family',
            'Free Stuff',
            'Garden & Outdoor',
            'Home Improvements',
            'Home Sales',
            'Musical Instruments',
            'Office Supplies',
            'Pet Supplies',
            'Sporting Goods',
            'Toys & Games',
        ];

        foreach ($categories as $category) {
            MarketplaceCategory::create(['name' => $category]);
        }
    }
}
