<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'total_collections',
        'active_members',
        'operational_hours',
        'wifi_facility',
        'location_address',
        'location_phone',
        'location_email',
        'map_embed_code',
    ];
}
