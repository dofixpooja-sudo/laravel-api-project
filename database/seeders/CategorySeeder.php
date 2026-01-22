<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Painting',
            'Plumbing',
            'Electrician',
            'AC Repair',
            'House Cleaning'
        ];

        foreach ($categories as $cat) {
            Category::create(['name' => $cat]);
        }
    }
}
