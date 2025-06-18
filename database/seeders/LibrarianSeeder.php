<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Librarian;

class LibrarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $librarians = [
            [
                'name' => 'Budi Santoso',
                'position' => 'Kepala Pustakawan',
                'description' => 'Berpengalaman lebih dari 15 tahun di bidang kepustakawanan dan manajemen arsip.',
                'image' => null, // Placeholder, can be updated manually later
                'linkedin' => 'https://linkedin.com/in/budisantoso',
                'twitter' => 'https://twitter.com/budisantoso',
                'email' => 'budi.santoso@example.com',
            ],
            [
                'name' => 'Dewi Lestari',
                'position' => 'Pustakawan Referensi',
                'description' => 'Ahli dalam pencarian informasi dan melayani kebutuhan riset pengguna perpustakaan.',
                'image' => null, // Placeholder, can be updated manually later
                'linkedin' => 'https://linkedin.com/in/dewilestari',
                'twitter' => null,
                'email' => 'dewi.lestari@example.com',
            ],
            [
                'name' => 'Andi Wijaya',
                'position' => 'Pustakawan Digital',
                'description' => 'Fokus pada pengembangan koleksi digital dan layanan perpustakaan online.',
                'image' => null, // Placeholder, can be updated manually later
                'linkedin' => null,
                'twitter' => 'https://twitter.com/andiwijaya',
                'email' => 'andi.wijaya@example.com',
            ],
        ];

        foreach ($librarians as $librarian) {
            Librarian::create($librarian);
        }
    }
} 