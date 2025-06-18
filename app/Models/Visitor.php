<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'institution',
        'purpose',
        'phone',
        'visit_date',
        'visit_time',
    ];

    protected $casts = [
        'visit_date' => 'date',
        'visit_time' => 'datetime',
    ];
} 