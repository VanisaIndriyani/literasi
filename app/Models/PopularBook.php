<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularBook extends Model
{
    protected $fillable = ['title', 'author', 'icon', 'color'];
}
