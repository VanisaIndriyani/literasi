<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'edition',
        'stock',
        'media_type',
        'publisher',
        'isbn',
        'year_published',
        'description',
        'color',
        'category_id',
        'location',
        'cover_image',
        'icon',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
