<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'description',
        'rating',

    ];

    public function covers()
    {
     return $this->hasMany(BookImage::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
