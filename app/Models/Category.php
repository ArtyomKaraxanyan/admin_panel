<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
    ];

    public function covers(): HasMany
    {
        return $this->hasMany(CategoryImage::class);
    }
    public function books()
    {
        return $this->hasMany(Category::class);
    }
}
