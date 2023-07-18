<?php
namespace App\Repositories\Interfaces;

interface BookRepositoryInterface
{
    public function getAllBooks();
    public function getBookById($categoryId);
    public function deleteBook($categoryId);
    public function createBook(array $categoryDetails);
    public function updateBook($categoryId, array $newDetails);
    public function getFulfilledBook();
    public function deleteBookImageById($categoryImageId);

}
