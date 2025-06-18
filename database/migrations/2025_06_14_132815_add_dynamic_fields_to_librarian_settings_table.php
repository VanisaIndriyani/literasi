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
        Schema::table('librarian_settings', function (Blueprint $table) {
            $table->string('header_title')->nullable();
            $table->string('header_subtitle')->nullable();
            $table->string('operational_hours_mf')->nullable();
            $table->string('operational_hours_s')->nullable();
            $table->string('operational_hours_sh')->nullable();
            $table->string('special_service_consultation')->nullable();
            $table->string('special_service_training')->nullable();
            $table->string('special_service_guidance')->nullable();
            $table->string('contact_section_title')->nullable();
            $table->string('contact_section_subtitle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('librarian_settings', function (Blueprint $table) {
            $table->dropColumn([
                'header_title',
                'header_subtitle',
                'operational_hours_mf',
                'operational_hours_s',
                'operational_hours_sh',
                'special_service_consultation',
                'special_service_training',
                'special_service_guidance',
                'contact_section_title',
                'contact_section_subtitle',
            ]);
        });
    }
};
