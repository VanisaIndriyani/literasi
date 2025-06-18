<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan file Excel berada di storage/app/imports/books.xlsx
        $file = storage_path('app/imports/books.xls');
        
        if (!file_exists($file)) {
            $this->command->error('File Excel tidak ditemukan di storage/app/imports/books.xlsx');
            return;
        }

        // Import data dari Excel
        Excel::import(new class implements \Maatwebsite\Excel\Concerns\ToCollection {
            public function collection($rows)
            {
                // Skip header row if exists (assuming row 1 is header)
                foreach ($rows->skip(1) as $row) {
                    // Pastikan indeks kolom sesuai dengan data Excel Anda
                    // Kolom di Excel biasanya A=0, B=1, C=2, dst.
                    $title = $row[0] ?? null; // Kolom A (Judul)
                    $edition = $row[1] ?? null; // Kolom B (Edisi)
                    $stock = is_numeric($row[2]) ? (int)$row[2] : 1; // Kolom C (Jumlah Eksemplar), pastikan angka
                    $publisher = $row[3] ?? null; // Kolom D (Penerbit)
                    $yearPublished = is_numeric($row[4]) ? (int)$row[4] : null; // Kolom E (Tahun Terbit), pastikan angka

                    $complexColumnM = $row[12] ?? ''; // Kolom M (Deskripsi, Pengarang, Tipe Media, ISBN)
                    $description = $complexColumnM; // Default description is the whole column M content
                    $author = null;
                    $mediaType = null;
                    $isbn = null;

                    // Extract author, media_type, and isbn from Kolom M using regex
                    if (preg_match('/ <([^<]+?) <([^<]+?) <([^>]+?)>>/', $complexColumnM, $matches)) {
                        $author = trim($matches[1]);
                        $mediaType = trim($matches[2]);
                        $isbn = trim($matches[3]);
                        // Optionally, remove extracted parts from description
                        $description = preg_replace('/ <([^<]+?) <([^<]+?) <([^>]+?)>>/', '', $complexColumnM);
                        $description = trim($description);
                    }

                    $colors = ['primary', 'success', 'danger', 'warning', 'info', 'purple'];
                    $randomColor = $colors[array_rand($colors)];

                    DB::table('books')->insert([
                        'title' => $title,
                        'author' => $author,
                        'edition' => $edition,
                        'stock' => $stock,
                        'media_type' => $mediaType,
                        'publisher' => $publisher,
                        'isbn' => $isbn,
                        'year_published' => $yearPublished,
                        'description' => $description,
                        'color' => $randomColor,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }, $file);
    }
} 