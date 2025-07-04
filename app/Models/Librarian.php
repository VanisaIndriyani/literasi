<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Librarian extends Model
{
    protected $fillable = ['name', 'position', 'description', 'image', 'linkedin', 'twitter', 'email'];
} 