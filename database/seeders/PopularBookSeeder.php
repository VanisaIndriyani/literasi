<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PopularBook;

class PopularBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $popularBooks = [
            ['title' => 'The Great Adventure', 'author' => 'Jane Doe', 'icon' => 'fas fa-book-open', 'color' => 'primary'],
            ['title' => 'Mysteries of the Deep', 'author' => 'John Smith', 'icon' => 'fas fa-atlas', 'color' => 'info'],
            ['title' => 'Coding for Beginners', 'author' => 'Alice Johnson', 'icon' => 'fas fa-laptop-code', 'color' => 'success'],
            ['title' => 'Historical Wonders', 'author' => 'Robert Brown', 'icon' => 'fas fa-scroll', 'color' => 'warning'],
            ['title' => 'Culinary Delights', 'author' => 'Emily White', 'icon' => 'fas fa-utensils', 'color' => 'danger'],
        ];

        foreach ($popularBooks as $book) {
            PopularBook::create($book);
        }
    }
} 