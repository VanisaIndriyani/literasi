<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi', 'icon' => 'fas fa-book'],
            ['name' => 'Non-Fiksi', 'icon' => 'fas fa-lightbulb'],
            ['name' => 'Sains', 'icon' => 'fas fa-flask'],
            ['name' => 'Teknologi', 'icon' => 'fas fa-laptop-code'],
            ['name' => 'Sejarah', 'icon' => 'fas fa-landmark'],
            ['name' => 'Biografi', 'icon' => 'fas fa-user'],
            ['name' => 'Seni', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'Memasak', 'icon' => 'fas fa-utensils'],
            ['name' => 'Travel', 'icon' => 'fas fa-plane'],
            ['name' => 'Anak-Anak', 'icon' => 'fas fa-child'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 