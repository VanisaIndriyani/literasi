<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->default('Selamat Datang di Ruang Literasi');
            $table->string('hero_subtitle')->default('Temukan ribuan koleksi buku untuk menambah wawasanmu');
            $table->integer('total_collections')->default(0);
            $table->integer('active_members')->default(0);
            $table->string('operational_hours')->default('08:00-17:00');
            $table->string('wifi_facility')->default('GRATIS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_settings');
    }
};
