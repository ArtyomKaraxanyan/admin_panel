<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\BookImage;
use App\Services\Category\CategoryService;
use App\Services\Book\BookService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Http\Requests\StoreBookRequest;
class BooksController extends Controller
{
    /**
     * @var CategoryService
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;

    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return $this->bookService->get();
    }

    public function create()
    {
    return $this->bookService->create();
    }


    public function store(StoreBookRequest $request)
    {

      $this->bookService->store($request->all());
        return redirect()->back()->withSuccess('Created!');;
    }

    public function edit(Book $book)
    {

    return $this->bookService->edit($book);
    }

    public function update(Book $book,UpdateBookRequest $request)
    {
        $request = $request->except(['_token', '_method' ]);
        $this->bookService->update($book,$request);
        return redirect()->back()->withSuccess('Updated!');;
    }
    public function destroy($id)
    {
        $this->bookService->delete($id);
        return redirect()->back()->withSuccess('Destroyed!');;
    }

    public function deleteBookImageById($bookImageId){
    $this->bookService->deleteBookImageById($bookImageId);
    }
}
