<?php

namespace App\Services\Book;


use App\Models\Book;
use App\Models\Category;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookService
{

    public function __construct(
        BookRepositoryInterface $bookRepository
    ) {
        $this->bookRepository = $bookRepository;
    }


    public function get()
    {
        return $this->bookRepository->getAllBooks();
    }


    public function create()
    {
        $categories=Category::all();
        return view('dashboard.books.create',['categories'=>$categories]);
    }
    public function store(array $bookDetails)
    {

        return $this->bookRepository->createBook($bookDetails);

    }
    public function edit($bookDetails)
    {
      return $this->bookRepository->getBookById($bookDetails);
    }
    public function update(Book $book, array $data)
    {
        $this->bookRepository->updateBook($book->id, $data);
    }

    public function delete($bookId)
    {
        $this->bookRepository->deleteBook($bookId);
    }
    public function deleteBookImageById($bookImageId){
    $this->bookRepository->deleteBookImageById($bookImageId);
    }

}
