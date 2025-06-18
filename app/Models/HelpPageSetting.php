<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpPageSetting extends Model
{
    protected $fillable = [
        'contact_email',
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
    ];
}
