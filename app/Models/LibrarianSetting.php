<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibrarianSetting extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'whatsapp',
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
    ];
}
