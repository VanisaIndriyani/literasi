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
        Schema::table('help_page_settings', function (Blueprint $table) {
            $table->string('header_title')->nullable();
            $table->string('header_subtitle')->nullable();
            $table->string('category_1_title')->nullable();
            $table->text('category_1_description')->nullable();
            $table->string('category_2_title')->nullable();
            $table->text('category_2_description')->nullable();
            $table->string('category_3_title')->nullable();
            $table->text('category_3_description')->nullable();
            $table->string('contact_section_title')->nullable();
            $table->string('contact_section_subtitle')->nullable();
            $table->string('contact_whatsapp_link')->nullable();
            $table->string('contact_telegram_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('help_page_settings', function (Blueprint $table) {
            $table->dropColumn([
                'header_title',
                'header_subtitle',
                'category_1_title',
                'category_1_description',
                'category_2_title',
                'category_2_description',
                'category_3_title',
                'category_3_description',
                'contact_section_title',
                'contact_section_subtitle',
                'contact_whatsapp_link',
                'contact_telegram_link',
            ]);
        });
    }
};
