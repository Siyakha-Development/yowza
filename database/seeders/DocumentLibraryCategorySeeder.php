<?php

namespace Database\Seeders;

use App\Models\DocumentLibraryCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentLibraryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            'Compliance',
            'Funding and tenders',
            'Finance',
            'HR',
            'Legal',
            'Marketing and Sales',
            'Operations',
        ];

        foreach ($categories as $category) {
            DocumentLibraryCategory::create(['name' => $category]);
        }
    }
}
