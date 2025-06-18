<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beritas = [
            [
                'title' => 'Peluncuran Koleksi Buku Terbaru Musim Ini',
                'content' => 'Perpustakaan Ruang Literasi dengan bangga mengumumkan peluncuran koleksi buku terbaru kami untuk musim ini, mencakup berbagai genre mulai dari fiksi ilmiah hingga sejarah kontemporer. Kunjungi kami untuk menemukan bacaan favorit Anda berikutnya!',
                'image' => null, // Placeholder, can be updated manually later
            ],
            [
                'title' => 'Workshop Penulisan Kreatif Bersama Penulis Ternama',
                'content' => 'Bergabunglah dengan workshop penulisan kreatif eksklusif kami yang akan dipandu oleh penulis ternama, [Nama Penulis]. Acara ini akan diadakan pada [Tanggal] di aula utama perpustakaan. Daftarkan diri Anda segera!',
                'image' => null, // Placeholder, can be updated manually later
            ],
            [
                'title' => 'Meningkatkan Literasi Digital di Era Modern',
                'content' => 'Artikel ini membahas pentingnya literasi digital dan bagaimana Ruang Literasi mendukung peningkatan keterampilan digital di komunitas melalui berbagai program dan sumber daya online.',
                'image' => null, // Placeholder, can be updated manually later
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
} 