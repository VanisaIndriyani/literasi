<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PopularBookSeeder::class);
        $this->call(InformationSettingSeeder::class);
        $this->call(LibrarianSeeder::class);
        $this->call(BeritaSeeder::class);
        $this->call(BookSeeder::class);
        
        
    }
}
