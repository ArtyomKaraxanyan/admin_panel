<?php
namespace App\Repositories;

use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;


class BookRepository implements BookRepositoryInterface
{
    public function getAllBooks()
    {
        $books=Book::paginate(15);
        return view('dashboard.books.index',["books"=>$books]);
    }
    public function getBookById($bookDetails){

        $categories=Category::where('id','!=',$bookDetails->category_id)->get();
        $bookCategory=Category::where('id',$bookDetails->category_id)->first();
        return view('dashboard.books.edit',['book'=>$bookDetails,'categories'=>$categories,'mainCategory'=>$bookCategory]);

    }
    public function deleteBook($bookId)
    {
        $bookImages=BookImage::where('book_id',$bookId)->get();
        foreach ($bookImages as $images){
            unlink(public_path().'/images/book/100x100/'.$images->path);
            unlink(public_path().'/images/book/original/'.$images->path);
        }
        Book::destroy($bookId);
    }
    public function createBook(array $bookDetails){
        $book= Book::create($bookDetails);
        if (count($bookDetails['cover'])>0){
            foreach ($bookDetails['cover'] as $cover){
                if ($cover->isFile()){
                    $file=['cover'=>$cover,'directory'=>'book'];
                    $name= FileUploadRepository::FileUpload($file);
                    BookImage::create(['book_id'=>$book->id,'path'=>$name]);
                }
            }
        }
    }
    public function updateBook($bookId, array $newDetails){

        if (isset($newDetails['cover']) && count($newDetails['cover'])>0){
            foreach ($newDetails['cover'] as $cover){
                if ($cover->isFile()){
                    $file=['cover'=>$cover,'directory'=>'book'];
                    $name= FileUploadRepository::FileUpload($file);
                    BookImage::create(['book_id'=>$bookId,'path'=>$name]);
                    $newDetails = Arr::except($newDetails,['cover']);
                }
            }
        }


        Book::whereId($bookId)->update($newDetails);
    }
    public function getFulfilledBook(){

    }
    public function deleteBookImageById($bookImageId){
        $image = BookImage::where('id',$bookImageId)->first();
        unlink(public_path().'/images/book/100x100/'.$image->path);
        unlink(public_path().'/images/book/original/'.$image->path);
        $image->destroy($bookImageId);
    }
}
