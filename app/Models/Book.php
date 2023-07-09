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
        'slug',
        'author',
        'description',
        'rating',
        'cover'

    ];

    protected $perPage = 10;

    public function getLogoFullPathAttribute()
    {
        $filePath = 'storage/uploads/books/' . $this->id . '/100x100/' . $this->logo;
        return asset($filePath);
    }
}
