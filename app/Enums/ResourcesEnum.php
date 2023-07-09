<?php

namespace App\Enums;

use App\Http\Controllers\Admin\BookCategoriesController;
use App\Http\Controllers\Admin\BooksController;

class ResourcesEnum
{
    public const NAMES = [
        'categories',
        'books'
    ];

    public const CLASSES = [
        BookCategoriesController::class,
        BooksController::class
    ];

    public static function all()
    {
        return array_combine(self::NAMES, self::CLASSES);
    }
}
