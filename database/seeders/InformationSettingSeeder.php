<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformationSetting;

class InformationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InformationSetting::create([
            'content' => 'Ini adalah konten informasi default untuk Ruang Literasi. Anda dapat mengeditnya melalui panel admin.',
        ]);
    }
} 